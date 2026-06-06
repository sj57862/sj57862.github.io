var express = require('express');
var router = express.Router();
const { db } = require('../../public/javascripts/pizza');

// Handle deletion POST form (form action="/pizza/delete" method="post")
router.post('/delete', function (req, res, next) {
  // Support nested or flat form fields
  let id = null;
  if (req.body && req.body.pizza && req.body.pizza.id) {
    id = req.body.pizza.id;
  } else if (req.body && req.body['pizza[id]']) {
    id = req.body['pizza[id]'];
  } else if (req.body && req.body.id) {
    id = req.body.id;
  }

  if (!id) {
    // nothing to delete - redirect back to list
    return res.redirect('/pizza');
  }

  db.prepare('DELETE FROM Pizza WHERE id = ?').run(id);

  // After deletion, redirect to pizza list
  res.redirect('/pizza');
});

module.exports = router;

