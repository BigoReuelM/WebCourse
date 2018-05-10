<script>
      $('#changePassForm').submit(function(e){
      e.preventDefault();

      var passwordDetails = $(this);

      $.ajax({
        type: 'POST',
        url: passwordDetails.attr('action'),
        data: passwordDetails.serialize(),
        dataType: 'json',
        success: function(response){

          if (response.success == true) {
            // if success we would show message
            // and also remove the error class
            $('#pass-message').append('<div class="alert alert-success text-center">' +
            '<span class="glyphicon glyphicon-ok"></span>' +
            ' Password has been updated.' +
            '</div>');

            $('.form-group').removeClass('has-error')
                  .removeClass('has-success');
            $('.text-danger').remove();
            // reset the form
            passwordDetails[0].reset();
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