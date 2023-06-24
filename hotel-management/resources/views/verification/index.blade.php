<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.head')
    </head>

<body>


    @include('layout.header')
    @include('layout.signin')
    @include('layout.footer')
    

    <script>
        var element = document.createElement("style");
        element.innerHTML = "background: #6a11cb;" +
            "background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));" +
            "background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));";
        document.head.appendChild(element);

        $(document).ready(function() {
            $('#verificationForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize(); 
                // console.log(formData);
                $.ajax({
                    url: "{{ route('verification.index') }}", 
                    type: "POST",
                    data: formData, 

                    success: function(response) {
                        if (response.title === 'Success' && response.url) {
                            swal(response.title, response.text, response.icon).then(function() {
                                window.location.href = response.url; // Redirect to the specified URL
                            });
                        } else {
                            swal(response.title, response.text, response.icon);
                        }
                    },

                    error: function() {
                        swal(response.title, response.text, response.icon);
                    }
                });
            });
        });
    </script>
</body>
</html>