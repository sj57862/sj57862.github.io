var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var lessMiddleware = require('less-middleware');
var logger = require('morgan');

var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users');

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
app.locals.appName = 'Pizza CRUD';
app.locals.appTagline = 'lab-i / crud';

app.use(logger('dev'));
app.use(express.json());
// Allow parsing of nested form fields like pizza[name] into req.body.pizza
app.use(express.urlencoded({ extended: true }));
app.use(cookieParser());
app.use(lessMiddleware(path.join(__dirname, 'public')));
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', indexRouter);
app.use('/users', usersRouter);

// mount pizza router BEFORE 404 handler so routes are reachable
const pizzaRouter = require('./routes/pizza');
app.use('/pizza', pizzaRouter);

// prosty endpoint diagnostyczny
app.get('/__ping', function(req, res) {
  res.status(200).send('pong');
});

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

// ... pizza router already mounted above ...

module.exports = app;
