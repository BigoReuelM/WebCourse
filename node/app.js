var express = require('express');
var session = require('express-session');
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
app.use(session({ secret: 'webtech', cookie: { maxAge: 60000 }}));

app.set('view engine','ejs');
app.use('/assets',express.static('assets'));

app.get('/index/:uid',function(req,res) {
  $uid = req.params.uid;
  connection.query('SELECT * from users where userID = ?',[$uid], function (error, results, fields) {
    if (error) throw error;
    var sessData = req.session;
     sessData.userData = results[0];
     res.redirect('/');
  });
});

app.get('/',function(req,res) {
  res.render('index',{data: req.session.userData});
})

app.get('/getContents/:contentID',function(req,res) {
  contentID = req.params.contentID;
  connection.query('SELECT * from content where contentID = ?',[contentID], function (error, results, fields) {
    if (error) throw error;
    res.setHeader('Content-Type', 'application/json');
    res.send(JSON.stringify(results));
  });
});
app.get('/announcement',function(req,res) {
  var sessData = req.session;
  res.render('announcement',{data: sessData.userData});
})

app.get('/notes/:type',function(req,res) {
  var sessData = req.session;
  var type = req.params.type;
  var lessonHead = '';
  if(type === 'servlets'){
    lessonHead = 'Servlets';
  }else if(type === 'jsp'){
    lessonHead = 'JSP';
  }else if(type === 'php'){
    lessonHead = 'PHP';
  }else if(type === 'websecurity'){
    lessonHead = 'Web Security';
  }else{
    lessonHead = 'Node.JS';
  }
  connection.query('SELECT * from content where topic = ?',[type], function (error, results, fields) {
    if (error) throw error;
    res.render('notes',{data: req.session.userData, content: results, title: lessonHead});
  });
});

app.get('/activities',function(req,res) {
  var sessData = req.session;

  res.render('activities',{data: req.session.userData});
})

app.get('/login',function(req,res) {
  var sessData = req.session;
  if(!sessData.userData){
    res.redirect('http://localhost/Webcourse');
  }else{
    res.redirect('/');
  }
})

app.get('/logout',function (req,res) {
  req.session.destroy();
  res.redirect('http://localhost/Webcourse');
})

app.listen(3000,function() {
  console.log('Listening on port 3000');
});

function checkSession(sess){
  if(!sess){
    res.redirect('http://localhost/Webcourse/index');
  }
}
