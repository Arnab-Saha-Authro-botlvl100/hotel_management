<!DOCTYPE html>
<html lang="en">
    <head>
       @include('layout.head')
       <style>
        tbody tr td:last-child {
            display: flex;
            justify-content: space-evenly;
        }
        thead th {
          align-items: center;
        }
        .fix{
          height: 90%;
          margin: auto; 
        }
    </style>
    </head>
    
<body>
    @include('layout.header')
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
    
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Selecao</span></h2>
              <p class="animate__animated fanimate__adeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
    
          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
    
          <!-- Slide 3 -->
          <div class="carousel-item">
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
    
          <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
          </a>
    
          <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
          </a>
    
        </div>
    
        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
          <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
          </defs>
          <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
          </g>
          <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
          </g>
          <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
          </g>
        </svg>
    
    </section>
    
    <section id="about" class="about">
        <div class="container">
  
          <div class="section-title" data-aos="zoom-out">
            <h2>About</h2>
            <p>Who we are</p>
          </div>
  
          <div class="row content" data-aos="fade-up">
            <div class="col-lg-6">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <a href="#" class="btn-learn-more">Learn More</a>
            </div>
          </div>
  
        </div>
    </section>
   
    <section id="rooms" class="rooms">
      <div class="container">
        <table id="datatablesSimple" class="table table-bordered table-striped">
          <thead class="mb-5">
              <tr class="mt-4">
                  <th>Image</th>
                 
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
                      <div class="d-flex justify-content-evenly">
                         
                              @if( $room->image)
                              <img src="{{ $room->image ? asset('images/' . $room->image) : 'path_to_default_image' }}" alt="" style="width: 45px; height: 45px" class="rounded-circle"
                              alt=""
                                  style="width: 45px; height: 45px"
                                  class="rounded-circle"
                              />
                              @endif
                          <div class="">
                              <p class="fw-bold"  style="font-size: 15px">Code No:</p>
                              <p class="font-weight-light" style="margin-top: -10px;
                              font-size: 10px;
                              margin-bottom: -15px;">{{ $room->code }}</p>
                          </div>
                      </div>
                  </td>
                  
                  <td><b>{{ $room->size }} SQ Ft</b></td>
                  <td>{{ $room->bed }}</td>
                  <td>{{ $room->person }}</td>
                  <td>{{ $room->seaview }}</td>
                  <td>{{ $room->price }}</td>
                  <td>{{ $room->vip }}</td>
                  <td class="fix">
                    {{-- {{ route('user/view', ['id' => encrypt($room->id)]) }} --}}
                    <a class="text-primary" data-id="{{encrypt($room->id)}}" id="show" data-toggle="modal" data-target="#myModal"><i class="bi bi-eye"></i></a>

                    <a href="{{ route('user/book', ['id' => encrypt($room->id)]) }}" data-id="{{encrypt($room->id)}}" id="book" class="text-success"><i class="bi bi-book"></i></a>
                  </td>
              </tr>
              @endforeach
          </tbody>
          
          
      </table>
      </div>
      
    </section>
    <div class="modal-body" id="modalBody">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Modal Title</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> 
            </div>
            <div class="modal-body">
            
              <div class="card" >
                <img class="card-img-top" alt="Chicago Skyscrapers"/>
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              
                <div class="card-footer fw-bold text-danger">2 days ago</div>
              </div>
       
            </div>
          </div>
        </div>
    </div>
   
    
    @include('layout.car')

    @include('layout.service')

    @include('layout.footer')
  
    @include('layout.underscript')
    
    <script>
      $(document).ready(function() {
        $('#datatablesSimple').DataTable();

        $(document).on('click', '.btn-close', function(e) {
          $('#myModal').modal('hide');
        });
        
        $(document).on('click', '#show', function(e) {
          e.preventDefault();
          var id = $(this).data('id');
          var url = "{{ route('user/view', ['id' => ':id']) }}";
          url = url.replace(':id', id);
          // console.log(url);
          $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
              var room = response.room;
              console.log(room);
           
              $('.card-img-top').attr('src', '{{ asset("images") }}/' + room.image);
              $('.card-title').text(room.code);
              $('.card-footer').text(room.price+' TK');
              $('#myModal').modal('show');
              // console.log(response);
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });
        });

        // $(document).on('click', '#book', function(e) {
        //   e.preventDefault();
        //   var id = $(this).data('id');
        //   var url = "{{ route('user/book', ['id' => ':id']) }}";
        //   url = url.replace(':id', id);
        //   // console.log(url);
        //   $.ajax({
        //     url: url,
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(response) {
             
        //       console.log(response);
        //     },
        //     error: function(xhr, status, error) {
        //       console.log(xhr.responseText);
        //     }
        //   });
        // });

      });
     

      
    </script>
    
      
</body>
</html>