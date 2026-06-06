var express = require('express');
var router = express.Router();
const createError = require('http-errors');
const { db } = require('../../public/javascripts/pizza');

router.get('/:id', function (req, res, next) {
  const id = req.params.id;
  const pizza = db.prepare('SELECT * FROM Pizza WHERE id = ?').get(id);

  if (!pizza) {
    return next(createError(404, 'Pizza not found'));
  }

  res.render('pizza/show', {
    title: pizza.name,
    activePage: 'pizza',
    pizza: pizza
  });
});

module.exports = router;
