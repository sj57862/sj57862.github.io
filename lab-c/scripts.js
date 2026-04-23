const MAP_SIZE = 400;
const COLS     = 4;
const ROWS     = 4;
const PIECE    = MAP_SIZE / COLS;

let map = L.map('map').setView([53.430127, 14.564802], 18);
let marker = null;

L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
  attribution: 'Tiles &copy; Esri'
}).addTo(map);


document.getElementById('locBtn').onclick = () => {
  navigator.geolocation.getCurrentPosition(pos => {
    const lat = pos.coords.latitude;
    const lon = pos.coords.longitude;

    map.setView([lat, lon], 16);

    if (marker) map.removeLayer(marker);
    marker = L.marker([lat, lon]).addTo(map);

    document.getElementById('coords').innerText =
      `Lat: ${lat.toFixed(6)}  Lon: ${lon.toFixed(6)}`;

  }, () => alert('Brak zgody na lokalizację'));
};


if (Notification.permission !== 'granted') {
  Notification.requestPermission();
}


function createBoard() {
  const board = document.getElementById('board');
  board.innerHTML = '';

  for (let i = 0; i < COLS * ROWS; i++) {
    const slot = document.createElement('div');
    slot.className = 'slot';
    slot.dataset.index = i;

    slot.addEventListener('dragover', e => {
      e.preventDefault();
      slot.classList.add('drag-over');
    });

    slot.addEventListener('dragleave', () => {
      slot.classList.remove('drag-over');
    });

    slot.addEventListener('drop', e => {
      e.preventDefault();
      slot.classList.remove('drag-over');

      const dragging = document.querySelector('.dragging');
      if (!dragging) return;

      // Jeśli slot zajęty — odłóż poprzedni element z powrotem na tacę
      if (slot.firstChild) {
        document.getElementById('puzzle').appendChild(slot.firstChild);
      }

      slot.appendChild(dragging);
      checkSlot(slot);
      checkWin();
    });

    board.appendChild(slot);
  }
}

createBoard();

document.getElementById('genBtn').onclick = () => {
  setTimeout(captureAndSplit, 400);
};


function captureAndSplit() {
  const canvas = document.getElementById('canvas');
  canvas.width  = MAP_SIZE;
  canvas.height = MAP_SIZE;
  const ctx = canvas.getContext('2d');
  ctx.clearRect(0, 0, MAP_SIZE, MAP_SIZE);

  const mapEl   = document.getElementById('map');
  const mapRect = mapEl.getBoundingClientRect();

  const tiles = document.querySelectorAll('.leaflet-tile');

  tiles.forEach(tile => {
    if (!(tile instanceof HTMLImageElement)) return;
    if (!tile.complete || tile.naturalWidth === 0) return;

    const rect = tile.getBoundingClientRect();
    const x = rect.left - mapRect.left;
    const y = rect.top  - mapRect.top;

    try {
      ctx.drawImage(tile, x, y, rect.width, rect.height);
    } catch (e) {

    }
  });

  createPuzzle(canvas);
}

function createPuzzle(sourceCanvas) {
  document.getElementById('puzzle').innerHTML = '';
  createBoard();

  const pieces = [];

  for (let row = 0; row < ROWS; row++) {
    for (let col = 0; col < COLS; col++) {

      const c = document.createElement('canvas');
      c.width  = PIECE;
      c.height = PIECE;

      const cctx = c.getContext('2d');

      cctx.drawImage(
        sourceCanvas,
        col * PIECE, row * PIECE,
        PIECE, PIECE,
        0, 0,
        PIECE, PIECE
      );

      c.className = 'tile';
      c.draggable = true;
      c.dataset.correct = row * COLS + col;

      c.addEventListener('dragstart', () => c.classList.add('dragging'));
      c.addEventListener('dragend',   () => c.classList.remove('dragging'));

      c.addEventListener('dragstart', () => {
        c._fromSlot = c.parentElement?.classList.contains('slot')
          ? c.parentElement
          : null;
      });

      pieces.push(c);
    }
  }

  // Tasowanie Fisher-Yates
  for (let i = pieces.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [pieces[i], pieces[j]] = [pieces[j], pieces[i]];
  }

  const tray = document.getElementById('puzzle');
  pieces.forEach(p => tray.appendChild(p));

  tray.addEventListener('dragover', e => e.preventDefault());
  tray.addEventListener('drop', e => {
    e.preventDefault();
    const dragging = document.querySelector('.dragging');
    if (dragging) {
      tray.appendChild(dragging);
      if (dragging._fromSlot) {
        dragging._fromSlot.classList.remove('correct');
      }
    }
  });
}


function checkSlot(slot) {
  const el = slot.firstChild;
  if (el && Number(el.dataset.correct) === Number(slot.dataset.index)) {
    slot.classList.add('correct');
  } else {
    slot.classList.remove('correct');
  }
}

function checkWin() {
  const slots = document.querySelectorAll('#board .slot');

  const allCorrect = [...slots].every(slot => {
    const el = slot.firstChild;
    return el && Number(el.dataset.correct) === Number(slot.dataset.index);
  });

  if (!allCorrect) return;
  console.log('Wygrana!');
  //document.getElementById('win-overlay').classList.add('visible');

  if (Notification.permission === "granted") {
    new Notification("Wygrana", {
      body: "Wygrano gre"
    });
  } else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(permission => {
      if (permission === "granted") {
        new Notification("Wygrana", {
          body: "Wygrano gre"
        });
      }
    });
  }
}

document.getElementById('resetBtn').onclick = () => {
  document.getElementById('win-overlay').classList.remove('visible');
  document.getElementById('puzzle').innerHTML = '';
  createBoard();
};
