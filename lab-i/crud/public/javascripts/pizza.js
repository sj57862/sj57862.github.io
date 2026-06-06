var express = require('express');
var Router = express.Router();
const {DatabaseSync} = require('node:sqlite');
const path = require('node:path');
const dbPath = path.resolve(__dirname,'..','data.db');
export const db = new DatabaseSync(dbPath);