<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->
  
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">
  
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Sign up now</h2>
            <form id="signup-form">
              @csrf
             
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" name="full_name" placeholder="Enter your full name" required/>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control" name="address" placeholder="Address in details" required/>
                  </div>
                </div>
                <div class="col-md-8 mb-4">
                  <input type="email" id="form3Example3" class="form-control" name="email" placeholder="Enter Valid Email Address" required/>
                </div>
                <div class="col-md-4 mb-4">
                  <input type="password" id="form3Example4" class="form-control" name="password" placeholder="Password" required/>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" id="form3Example5" class="form-control" name="nid" placeholder="NID" pattern="^[0-9]*$" inputmode="numeric" required />
                  </div>                  
                </div>
                <div class="col-md-6 mb-4">
                 
                  <select class="form-select" id="gender" name="gender" required>
                    <option value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                  </select>
                </div>
              </div>
            
              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Sign up
              </button>
            </form>
            
            <!-- Register buttons -->
            <div class="text-center">
              <p>or sign up with:</p>
              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->