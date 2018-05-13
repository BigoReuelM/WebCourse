function setNotes(id) {
  var content = "";
  var host = window.location.host;
  $.ajax({
    'url': '/getContents/'+id,
    success: function(result) {
      result = result[0];
      content = '<h1>'+result.title+'</h1>'+
      '<h2>'+result.heading+'</h2>'+
      '<h3>Content:</h3>'+
      '<p>'+result.body+'</p>'+
      '<h3>Example:</h3>'+
      '<p>'+result.body+'</p>';

      $('#lessonBody').html(content);
    }
  });
}
