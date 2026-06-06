var express = require('express');
var router = express.Router();
const { db } = require('../public/javascripts/pizza');

router.get('/', function(req, res, next) {
  const stats = db.prepare('SELECT COUNT(*) AS total FROM Pizza').get();

  res.render('index', {
    title: 'Dashboard',
    activePage: 'home',
    pizzaCount: stats.total
  });
});

module.exports = router;
