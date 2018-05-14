var express = require('express');
var session = require('express-session');
var mysql      = require('mysql');
const url = require('url');
var bodyParser = require('body-parser');
var arrayCompare = require("array-compare");

var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'webtechlec'
});


// create application/json parser
var jsonParser = bodyParser.json()

// create application/x-www-form-urlencoded parser
var urlencodedParser = bodyParser.urlencoded({ extended: true })

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
     if(results[0].userType){
       connection.query('SELECT * from users inner join students on users.userID = students.userID where students.userID = ?'
       ,[$uid], function (error, results, fields) {
          var sessData = req.session;
          sessData.studData = results[0];
          res.redirect('/');
       })
     }else{
       res.redirect('/');
     }
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
  var sessData = req.session.studData;
  
  connection.query('SELECT * from activity', function (error, results, fields) {
    if (error) throw error;
    res.render('activities',{data: req.session.userData, activities: results});
  });
})


app.get('/quiz/:actID',function(req,res) {
  var activityID = req.params.actID;
  connection.query('SELECT * from questions where activityID = ?',[activityID], function (error, results, fields) {
    if (error) throw error;
    res.render('quiz',{data: req.session.userData, quiz: results, actID: activityID});
  });
})

app.post('/checkResults/:actID',urlencodedParser,function(req,res) {
  actID = req.params.actID;
  studentID = req.session.studData.studentID;
  var arr = [];
  var answers = [];
  var counter = 0;
  var score = 0;

  if(req.body){
    for(var key in req.body) {
      if(req.body.hasOwnProperty(key)){
        arr.push(req.body[key]);
      }
    }
  }
  connection.query('SELECT * from questions where activityID = ?',[actID], function (error, results, fields) {
    if (error) throw error;
    results.forEach(function(item) {

      if(arr[counter] === item.answer){
        score++;
      }
      counter++;
    })
    var post = {
                dateTime: new Date(),
                score: score,
                activityID: actID,
                studentID: studentID,
            };
    connection.query('Insert into records set ?',post, function (error, results, fields) {
      if (error) throw error;
      res.render('viewScore',{score: score, counter: counter});
    });
  });
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
