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

function takeQuiz(actID) {
  $('#quizConfirmDialog').modal('toggle');
  width = 450;
  height = 600;
  var center_left = (screen.width / 2) - (width / 2);
  	var center_top = (screen.height / 2) - (height / 2);
    win = window.open('/quiz/'+actID, "Title", "scrollbars=1, width="+width
    +", height="+height+", left="+center_left+", top="+center_top);
	  win.focus();
}

$('#quizConfirmDialog').on('show.bs.modal', function (e) {
  var actID = $(e.relatedTarget).data('act');
  $('#yesBtn').attr('onclick','takeQuiz('+actID+')');
})
