const Database = require('better-sqlite3');
const path = require('path');

const dbPath = path.resolve(__dirname, '..', 'public', 'data.db');
const db = new Database(dbPath, { readonly: true });

try {
  const schema = db.prepare("SELECT sql FROM sqlite_master WHERE type='table' AND name='Pizza'").get();
  console.log('Schema for Pizza:');
  console.log(schema ? schema.sql : 'Tabela Pizza nie istnieje');

  const rows = db.prepare('SELECT * FROM Pizza').all();
  console.log('Rekordy w tabeli Pizza:', rows.length);
  rows.forEach(r => console.log(r));
} catch (err) {
  console.error('Błąd podczas odczytu bazy:', err.message);
} finally {
  db.close();
}

