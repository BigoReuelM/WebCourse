var express = require('express');
var session = require('express-session');
var db = require('./model/dbconnect');
var mysql      = require('mysql');
const url = require('url');

var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'webtechlec'
});


var app = express();

app.set('trust proxy', 1) // trust first proxy
app.use(session({
  secret: 'webtech',
  resave: false,
  saveUninitialized: true,
  cookie: { secure: true}
}))

app.set('view engine','ejs');
app.use('/assets',express.static('assets'));


app.get('/:uid',function(req,res) {
  $uid = req.params.uid;

  connection.query('SELECT * from users where userID = ?',[$uid], function (error, results, fields) {
    if (error) throw error;
      req.session.userData = results;
      res.render('index',{data: req.session.userData[0]});
  });
});

app.get('/announcement',function(req,res) {
  res.render('announcement')
})

app.get('/loadServlets',function(req,res) {
  res.render('loadServlets');
})

app.get('/loadJSP',function(req,res) {
  res.render('loadJSP');
})

app.get('/loadPHP',function(req,res) {
  res.render('loadPHP');
})

app.get('/loadNode',function(req,res) {
  res.render('loadNode');
})

app.get('/loadWebSecurity',function(req,res) {
  res.render('loadWebSecurity');
})

app.get('/activities',function(req,res) {
  res.render('loadWebSecurity');
})

app.get('/login',function(req,res) {
  res.redirect('http://localhost/Webcourse');
})

app.get('/logout',function () {
  req.session.destroy();
  res.redirect('http://localhost/Webcourse');
})

app.listen(3000,function() {
  console.log('Listening on port 3000');
});
