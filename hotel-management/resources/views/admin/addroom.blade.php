    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
         @include('layout.head')
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @include('layout.adminnav')
        {{-- @include('layout.hero') --}}
        <div class="container" id= "layoutSidenav">
            @include('layout.adminsidenav')
            <div id="layoutSidenav_content">
                <main>

                    <div class="card mb-3 ">
                        <h3 class="text-center my-2 ">Add new room</h3>
                        <form class="row g-3 px-3 m-2" action="{{ route('admin/addroom') }}" method="post" enctype="multipart/form-data" id="roomadd">
                            @csrf
                            @method('POST')
                            <div class="col-md-3">
                              <label for="code" class="form-label">Code</label>
                              <input type="number" class="form-control" id="code" name="code" required>
                            </div>
                            <div class="col-md-3">
                              <label for="size" class="form-label">Size</label>
                              <input type="number" class="form-control" id="size" name="size">
                            </div>
                            <div class="col-md-3">
                              <label for="bed" class="form-label">Bed</label>
                              <input type="number" class="form-control" id="bed" name="bed">
                            </div>
                            <div class="col-md-3">
                              <label for="person" class="form-label">Person</label>
                              <input type="number" class="form-control" id="person" name="person">
                            </div>
                            <div class="col-md-2">
                              <label for="seaview" class="form-label">Seaview</label><br>
                              <select id="seaview" name="seaview" class="form-control">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label for="vip" class="form-label">Vip</label><br>
                              <select id="vip" name="vip" class="form-control">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label for="price" class="form-label">Price</label>
                              <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="col-md-6">
                              <div class="form-check">
                                <label class="form-check-label" for="image">Add image</label>
                                <input class="form-control" type="file" id="image" name="image">
                              </div>
                            </div>
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </form>
                          
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Code</th>
                                        <th>Size</th>
                                        <th>Bed</th>
                                        <th>Person</th>
                                        <th>Seaview</th>
                                        <th>Price</th>
                                        <th>Vip</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                    @foreach($rooms as $room) 
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                               
                                                    @if( $room->image)
                                                    <img src="{{ $room->image ? asset('images/' . $room->image) : 'path_to_default_image' }}" alt="" style="width: 45px; height: 45px" class="rounded-circle"
                                                    alt=""
                                                        style="width: 45px; height: 45px"
                                                        class="rounded-circle"
                                                    />
                                                    @endif
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">{{ $room->id }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $room->code }}</td>
                                        <td><b>{{ $room->size }} SQ Ft</b></td>
                                        <td>{{ $room->bed }}</td>
                                        <td>{{ $room->person }}</td>
                                        <td>{{ $room->seaview }}</td>
                                        <td>{{ $room->price }}</td>
                                        <td>{{ $room->vip }}</td>
                                        <td class="d-flex justify-contact-evenly custom">
                                            <a href="{{ route('admin/editroom', ['id' => encrypt($room->id)]) }}" ><i class="bi bi-pencil-square"></i></a>
                                            <a href="{{ route('admin/deleteroom', ['id' => encrypt($room->id)]) }}" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
       
        @include('layout.underscript')
        <script>
          
            window.addEventListener('DOMContentLoaded', event => {

            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
            
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }

            });

            window.addEventListener('DOMContentLoaded', event => {
   
            const datatablesSimple = document.getElementById('datatablesSimple');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
            });

            $(document).ready(function() {
                $('#roomlist').DataTable();
                $('#roomadd').on('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    var formData = new FormData(this);
                    formData.append('image_name', $('#image').prop('files')[0].name); // Append the image name to the form data
                    console.log(formData);
                    $.ajax({
                        url: $(this).attr('action'),
                        method: $(this).attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
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