<script>
	$('#activityButton').click(function() {
		var questionNumber = $('#questionNumber').val();
		//alert(questionNumber);

		for (i = 1; i <= questionNumber; i++) {
    		$('#addQuestionForm').append(
	    		'<div class="well">' +
	    			'<div class="row">' +
	    				'<div class="col-lg-1">' +
	    					'<h1>' + i + '</h1>' +
	    				'</div>'+
	    				'<div class="col-lg-11">' +
			    			'<div class="form-group">' + 
			    			'<label class="col-lg-3 control-label">Questions: </label>' + 
			    			'<div class="col-lg-9">' +
			    				'<input type="text" name="question[]" class="form-control" required>' +
			    			'</div>' +
			    			'<div class="form-group">' + 
			    			'<label class="col-lg-3 control-label">Answer: </label>' + 
			    			'<div class="col-lg-9">' +
			    				'<input type="text" name="answer[]" class="form-control" required>' +
			    			'</div>' +
			    		'</div>' + 
		    		'</div>' +
	    		'</div>' 
    		);
		}
	});
</script>

<script>
    $('#addQuestionForm').submit(function(e){
        e.preventDefault();

        var activityDetails = $(this);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: activityDetails.attr('action'),
            data: activityDetails.serialize(),
            success: function(response){
                if (response.success == true) {
                	alert("Activity Has Been Saved!");
                }
            }
        });
    });
</script>
