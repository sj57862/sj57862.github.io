// Tworzy plik public/data.db i tabelę Pizza
const Database = require('better-sqlite3');
const path = require('path');
const fs = require('fs');

const publicDir = path.resolve(__dirname, '..', 'public');
if (!fs.existsSync(publicDir)) fs.mkdirSync(publicDir, { recursive: true });
const dbPath = path.join(publicDir, 'data.db');

const db = new Database(dbPath);

db.exec(`
CREATE TABLE IF NOT EXISTS Pizza (
    id INTEGER NOT NULL CONSTRAINT pizza_pk PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    price REAL NOT NULL,
    description TEXT NOT NULL
);
`);

// Dodaj przykładowy rekord tylko jeśli tabelka jest pusta
const rowCount = db.prepare('SELECT COUNT(*) as c FROM Pizza').get().c;
if (rowCount === 0) {
  db.prepare('INSERT INTO Pizza (name, price, description) VALUES (?, ?, ?)')
    .run('Margherita', 12.5, 'sos, ser, bazylia');
  console.log('Dodano przykładowy rekord do Pizza');
} else {
  console.log('Tabela Pizza już zawiera rekordy, nie dodano przykładu');
}

db.close();
console.log('Baza utworzona/aktualizowana:', dbPath);

