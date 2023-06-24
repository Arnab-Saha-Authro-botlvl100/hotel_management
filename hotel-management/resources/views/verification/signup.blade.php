<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.head')
    </head>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
<body>


    @include('layout.header')
    @include('layout.signup')
    @include('layout.footer')
    
</body>
<script type="text/javascript">
    $(document).ready(function() {

    $('#form3Example5').on('input', function(e) {
        var inputValue = $(this).val();
        var sanitizedValue = inputValue.replace(/\D/g, '');
        var limitedValue = sanitizedValue.slice(0, 10);
        $(this).val(limitedValue);

        });
    });

</script>
<script>
    // Function to send data using AJAX
    function sendData() {
      // Get the form data
      var formData = {
        full_name: $('#form3Example1').val(),
        address: $('#form3Example2').val(),
        email: $('#form3Example3').val(),
        password: $('#form3Example4').val(),
        nid: $('#form3Example5').val(),
        gender: $('#gender').val()
      };
  
      $.ajax({
        url: "{{ route('signup') }}",
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
          if (response.title == 'Success') {
            swal(response.title, response.text, response.icon);
            window.location.href = "{{ route('view') }}";
          }
          else {
            swal("Error", response.text, "error");
          }
        },
        error: function() {
          swal("Error", "An error occurred while sending the request.", "error");
        }
      });
    }
    $('#signup-form').submit(function(event) {
      event.preventDefault(); 
      sendData(); 
    });
  </script>
</html>