var express = require('express');
var app = express();


app.set('view engine','ejs');
app.use('/assets',express.static('assets'));

app.get('/',function(req,res) {
  res.render('index');
})

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

app.listen(3000,function() {
  console.log('Listening on port 3000');
});
