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
        <script type="text/javascript">
            function printTable() {
                var table = document.getElementById("datatablesSimple");
                var printWindow = window.open("", "_blank");
                printWindow.document.write('<html><head><title>Table Print</title></head><body>');
                printWindow.document.write('<style>table { border-collapse: collapse; } th, td { border: 1px solid black; padding: 8px; }</style>');
                printWindow.document.write(table.outerHTML);
                printWindow.document.write('</body></html>');
                printWindow.print();
                printWindow.close();
            }
        </script>
    </head>
    <body class="sb-nav-fixed">
        @if(session('alert'))
            <script>
                alert('{{ session('alert') }}');
            </script>
            <?php session()->forget('alert'); ?>

        @endif
        @include('layout.adminnav') 
        <div id="layoutSidenav">
            @include('layout.adminsidenav')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Add Room</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('admin/addroom')}}">Add</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Rooms
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>User ID</th>
                                            <th>NID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Room ID</th>
                                            <th>Room CODE</th>
                                            <th>Cheack IN Date </th>
                                            <th>Status</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                        @foreach($bookings as $booking) 
                                        <tr>
                                            <td>
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">{{ $booking->user->id }}</p>
                                                
                                                </div>
                                            </td>
                                            <td>{{ $booking->user->nid }}</td>
                                            <td><b>{{ $booking->user->name }}</b></td>
                                            <td>{{ $booking->phone }}</td>
                                            <td><b>{{ $booking->room_id }}</b></td>
                                            <td>{{ $booking->room->code }}</td>
                                            <td>{{ $booking->departure_date }}</td>
                                            <td ><b style="color:rgb(48, 168, 17); ">{{ $booking->status }}</b></td>
                                            {{-- <td class="d-flex justify-contact-evenly custom">
                                                <a href="{{ route('admin/editroom', ['id' => encrypt($booking->id)]) }}" ><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ route('admin/deleteroom', ['id' => encrypt($booking->id)]) }}" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                    
                                </table>
                                <button class="btn btn-primary" onclick="printTable()">Print</button>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
       
        @include('layout.underscript')
        <script>
            $(document).ready(function() {
                $('#roomlist').DataTable();
            });

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
