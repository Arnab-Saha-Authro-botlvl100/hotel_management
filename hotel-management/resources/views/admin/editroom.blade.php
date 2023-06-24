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
        <style>
            tbody tr td:last-child {
                display: flex;
                justify-content: space-evenly;
            }
        </style>
    </head>
    <body>
        @include('layout.adminnav')
        {{-- @include('layout.hero') --}}
        <div class="container" id= "layoutSidenav">
            @include('layout.adminsidenav')
            <div id="layoutSidenav_content">
                <main>
                   
                    <div class="card mb-3 ">
                        <h3 class="text-center my-2 ">Edit new room <span class="fw-bold text-danger">{{$room->code}}</span></h3>
                        <form class="row g-3 px-3 m-2" action="{{ route('admin/editroom', ['id' => encrypt($room->id)]) }}" method="post" enctype="multipart/form-data" id="roomadd">
                            @csrf
                            @method('POST')
                            
                            <div class="col-md-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="number" class="form-control" id="code" name="code" value="{{ $room->code }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="size" class="form-label">Size</label>
                                <input type="number" class="form-control" id="size" name="size" value="{{ $room->size }}">
                            </div>
                            <div class="col-md-3">
                                <label for="bed" class="form-label">Bed</label>
                                <input type="number" class="form-control" id="bed" name="bed" value="{{ $room->bed }}">
                            </div>
                            <div class="col-md-3">
                                <label for="person" class="form-label">Person</label>
                                <input type="number" class="form-control" id="person" name="person" value="{{ $room->person }}">
                            </div>
                            <div class="col-md-2">
                                <label for="seaview" class="form-label">Seaview</label><br>
                                <select id="seaview" name="seaview" class="form-control" value="{{ $room->seaview }}">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="vip" class="form-label">Vip</label><br>
                                <select id="vip" name="vip" class="form-control" value="{{ $room->vip }}">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $room->price }}">
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <label class="form-check-label" for="image">Add image</label>
                                    <input class="form-control" type="file" id="image" name="image" value="{{ $room->image }}">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </form>
                        
                          
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
            var fileName = '<?php echo $room->image ?>';
           
            // Check if the file name exists
            if (fileName) {
                
                var fileInput = document.getElementById('image');
                fileInput.innnerHTML = fileName;
                var file = new File([], fileName);
                console.log(file);
                fileInput.files = [file];
            }

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

          

        </script>
        
    </body>
</html>
