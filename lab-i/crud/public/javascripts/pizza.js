// ...existing code...
// Używamy better-sqlite3 (zainstalowane w projekcie) do prostego sync dostępu do SQLite
const Database = require('better-sqlite3');
const path = require('path');
const dbPath = path.resolve(__dirname, '..', 'data.db');
const db = new Database(dbPath);

// Eksport w stylu CommonJS, tak by reszta aplikacji mogła użyć require(...).db
module.exports = { db };
