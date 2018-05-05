
<script>
    $('#addNewInstructorForm').submit(function(e){
        e.preventDefault();

        var instructorDetails = $(this);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: instructorDetails.attr('action'),
            data: instructorDetails.serialize(),
            success: function(response){
                if (response.success == true) {
                    // if success we would show message
                    // and also remove the error class
                    $('#the-message').append('<div class="alert alert-success text-center">' +
                    '<span class="glyphicon glyphicon-ok"></span>' +
                    ' New client has been saved.' +
                    '</div>');
                    $('.form-group').removeClass('has-error')
                          .removeClass('has-success');
                    $('.text-danger').remove();
                    // reset the form
                    instructorDetails[0].reset();
                    // close the message after seconds
                    $('.alert-success').delay(500).show(10, function() {
                     $(this).delay(3000).hide(10, function() {
                        $(this).remove();
                      });
                    })
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
