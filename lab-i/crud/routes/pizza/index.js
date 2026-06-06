var express = require('express');
var router = express.Router();
const { db } = require('../../public/javascripts/pizza');

router.use('/', require('./create'));
router.use('/', require('./edit'));
router.use('/', require('./show'));
router.use('/', require('./delete'));

router.get('/', function (req, res, next) {
  const pizzas = db.prepare('SELECT * FROM Pizza').all();
  res.render('pizza/index', {
    title: 'Pizza list',
    activePage: 'pizza',
    pizzas: pizzas
  });
});

module.exports = router;

