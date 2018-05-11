<script>
	$('.lessonDeleteButton').click(function() {
		var lessonDestails = $(this).val.split(',');
		$('#lessonID').val(lessonDestails[0]);
		$('#lessonNameModal').text("Delete This Lesson: " + lessonDestails[1] + "?"); 
	});
</script>