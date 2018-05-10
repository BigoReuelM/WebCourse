
<script>
    $('#addLessonForm').submit(function(e){
        e.preventDefault();

        var lessonDetails = $(this);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: lessonDetails.attr('action'),
            data: lessonDetails.serialize(),
            success: function(response){
                if (response.success == true) {
                    
                    lessonDetails[0].reset();
                    
                    alert("New Lesson Added");

                }else{
                    $.each(response.messages, function(key, value) {
                      var element = $('#' + key);
                      
                      element.closest('div.form-group')
                      .removeClass('has-error')
                      .addClass(value.length > 0 ? 'has-error' : 'has-success')
                      .find('.text-danger')
                      .remove();
                      
                      element.after(value);
                    });
                }
            }
        });
    });
</script>
