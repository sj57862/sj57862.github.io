var express = require('express');
var router = express.Router();
const createError = require('http-errors');
const { db } = require('../../public/javascripts/pizza');

router.get('/:id/edit', function (req, res, next) {
  const id = req.params.id;
  const pizza = db.prepare('SELECT * FROM Pizza WHERE id = ?').get(id);

  if (!pizza) {
    return next(createError(404, 'Pizza not found'));
  }

  res.render('pizza/edit', {
    title: 'Edit pizza',
    activePage: 'pizza',
    pizza: pizza
  });
});

router.post('/edit', function (req, res, next) {
  let payload = req.body && req.body.pizza;

  if (!payload) {
    if (req.body && (req.body['pizza[name]'] || req.body['pizza[price]'] || req.body['pizza[description]'] || req.body['pizza[id]'])) {
      payload = {
        id: req.body['pizza[id]'],
        name: req.body['pizza[name]'] || '',
        price: parseFloat(req.body['pizza[price]']) || 0,
        description: req.body['pizza[description]'] || ''
      };
    } else if (req.body && (req.body.id || req.body.name || req.body.price || req.body.description)) {
      payload = {
        id: req.body.id,
        name: req.body.name || '',
        price: parseFloat(req.body.price) || 0,
        description: req.body.description || ''
      };
    }
  }

  const id = payload && payload.id;
  if (!id || !payload.name) {
    const pizza = id ? db.prepare('SELECT * FROM Pizza WHERE id = ?').get(id) : null;

    return res.status(400).render('pizza/edit', {
      title: 'Edit pizza',
      activePage: 'pizza',
      pizza: payload || pizza || {
        id: id || '',
        name: '',
        price: '',
        description: ''
      },
      error: 'Pizza name is required.'
    });
  }

  db.prepare('UPDATE Pizza SET name = ?, price = ?, description = ? WHERE id = ?')
    .run(payload.name, payload.price, payload.description, id);

  res.redirect('/pizza');
});

module.exports = router;
