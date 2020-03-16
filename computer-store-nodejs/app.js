var express = require('express');
var path = require('path');
var bodyParser = require('body-parser');
var port = 3100;
var routes = require('./routes/index');
var app = express();

app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use(express.static(path.join(__dirname, 'public')));
app.use('/css', express.static(__dirname+'/node_modules/bootstrap/dist/css'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));
app.use('/', routes);

app.listen(port);
console.log('server has started on port '+ port);

module.exports = app;
