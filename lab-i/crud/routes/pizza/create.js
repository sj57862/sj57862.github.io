var express = require('express');
var router = express.Router();
const { db } = require('../../public/javascripts/pizza');

router.get('/create', function (req, res, next) {
  res.render('pizza/create', {
    title: 'Create pizza',
    activePage: 'pizza',
    pizza: {
      name: '',
      price: '',
      description: ''
    }
  });
});

router.post('/create', function (req, res, next) {
  let pizza = req.body && req.body.pizza;

  if (!pizza) {
    if (req.body && (req.body['pizza[name]'] || req.body['pizza[price]'] || req.body['pizza[description]'])) {
      pizza = {
        name: req.body['pizza[name]'] || '',
        price: parseFloat(req.body['pizza[price]']) || 0,
        description: req.body['pizza[description]'] || ''
      };
    } else if (req.body && (req.body.name || req.body.price || req.body.description)) {
      pizza = {
        name: req.body.name || '',
        price: parseFloat(req.body.price) || 0,
        description: req.body.description || ''
      };
    }
  }

  if (!pizza || !pizza.name) {
    return res.status(400).render('pizza/create', {
      title: 'Create pizza',
      activePage: 'pizza',
      error: 'Pizza name is required.',
      pizza: pizza || {
        name: '',
        price: '',
        description: ''
      }
    });
  }

  db.prepare('INSERT INTO Pizza(name,price,description) VALUES (?,?,?)')
    .run(pizza.name, pizza.price, pizza.description);

  res.redirect('/pizza');
});

module.exports = router;
