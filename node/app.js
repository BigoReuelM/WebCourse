var express = require('express');
app = express();

app.set('view engine','ejs');
app.use('/assets',express.static('assets'));

app.get('/',function(req,res) {
  res.render('index');
})


app.listen(3000,function() {
  console.log('Listening on port 3000');
})
