<!doctype html>
<html lang="en">
<head>
    @include('dashboard.layouts.head')
    <title>Login</title>
</head>
<body style="background-image: url('pegawai/images/img_2.jpeg');">
@include('components.navbar')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-5">
  
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-1">Login SI KARYAWAN</h1>
                      <img src="img/logo.png" class="mt-2 mb-4" width="100">
                    </div>

                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="input-email" class="form-label">email</label>
                            <input type="tesr" class="form-control" id="input-email" name="email" />
                            @error('email')
                            <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="input-password" class="form-label">password</label>
                            <input type="password" class="form-control" id="input-password" name="password" />
                            @error('password')
                            <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <center><button class="btn btn-primary" type="submit">Login</button></center>
                        </div>
                        @error('auth')
                            <small class="text-danger mt-2">{{ $message }}</small>
                        @enderror
                    </form>
  
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
  
      </div>

</div>
</body>
</html>