<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout.head')
</head>
<body>
   @include('layout.header')

   <div class="mb-5 pb-5"></div>
    <div class="container d-flex justify-content-center align-item-center">
        <form id="bookingForm" class="mt-5 h-100">
            @csrf
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form6Example1" class="form-control" value="{{$user->name}}"/>
                  <label class="form-label" for="form6Example1">Customer Name</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form6Example2" class="form-control" value="{{$user->nid}}"/>
                  <input type="hidden" id="uid" class="form-control" value="{{$user->id}}"/>
                  <label class="form-label" for="form6Example2">NID</label>
                </div>
              </div>
            </div>
          
            <!-- Text input -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example3" class="form-control" value="{{$room->code}}"/>
              <input type="hidden" id="rid" class="form-control" value="{{$room->id}}"/>
              <label class="form-label" for="form6Example3">Room Code</label>
            </div>
          
            <!-- Text input -->
            <div class="form-outline mb-4">
              <input type="datetime-local" id="form6Example4" class="form-control" />
              <label class="form-label" for="form6Example4">Check IN Date</label>
            </div>

           
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form6Example5" class="form-control" value="{{$user->email}}"/>
              <label class="form-label" for="form6Example5">Email</label>
            </div>
          
            <!-- Number input -->
            <div class="form-outline mb-4">
              <input type="number" id="form6Example6" class="form-control" />
              <label class="form-label" for="form6Example6">Phone</label>
            </div>
          
            <!-- Message input -->
            <div class="form-outline mb-4">
              <textarea class="form-control" id="form6Example7" rows="4"></textarea>
              <label class="form-label" for="form6Example7">Additional information</label>
            </div>
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
        </form>
    </div>
    @include('layout.footer')
    @include('layout.underscript')
    
<script>
    $(document).ready(function() {
        $('#bookingForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            
            // Gather form data
            var formData = {
                name: $('#form6Example1').val(),
                nid: $('#form6Example2').val(),
                roomCode: $('#form6Example3').val(),
                departureDate: $('#form6Example4').val(),
                email: $('#form6Example5').val(),
                phone: $('#form6Example6').val(),
                additionalInfo: $('#form6Example7').val(),
                uid: $('#uid').val(),
                rid: $('#rid').val(),
                _token: '{{ csrf_token() }}'
            };
           const url = new URL(window.location.href)
            // Make Ajax request
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.title == 'Success') {
                        swal(response.title, response.text, response.icon).then(function() {
                          const baseUrl = `${url.protocol}//${url.host}/`;
                          const newPath = 'user/index';
                          const newUrl = baseUrl + newPath;
                          window.location.href = newUrl;
                        });
                    } 
                    else {
                        swal(response.title, response.text, response.icon).then(function() {
                            window.history.back(); // Redirect to the specified URL
                        });
                        }
                    },

                    error: function() {
                        swal(response.title, response.text, response.icon).then(function() {
                            window.history.back(); // Redirect to the specified URL
                        });
                    }
            });
        });
    });
</script>
</body>
</html>