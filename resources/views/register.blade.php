<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
      <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{asset('CSS/Signup.css')}}" rel="stylesheet"> 

</head>
<body>
    <!-- Main content -->
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="signup-card card shadow p-4">
                    <div class="card-body">
                        <h2 class="text-black fw-bold text-center mb-4">Sign Up</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form enctype="multipart/form-data" action="" method="POST">
                           @csrf
                        <div class="row">
                          <div class="mb-3 row align-items-center">
                                <label for="first_name" class="col-sm-3 col-form-label text-black fw-bold">First Name:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                                </div>
                            </div>
                            <!-- Last Name -->
                            <div class="mb-3 row align-items-center">
                                <label for="last_name" class="col-sm-3 col-form-label text-black fw-bold">Last Name:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="last_name" name="lastname" required>
                                </div>
                            </div>
                                     <!-- Username -->
                            <div class="mb-3 row align-items-center">
                                <label for="username" class="col-sm-3 col-form-label text-black fw-bold">Username:</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="mb-3 row align-items-center">
                                <label for="password" class="col-sm-3 col-form-label text-black fw-bold">Password:</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <!-- Confirm Password -->
                            <div class="mb-3 row align-items-center">
                                <label for="password_confirmation" class="col-sm-3 col-form-label text-black fw-bold">Confirm Password:</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                            <!-- Submit Button -->
                            <div class="row mt-4">
                                <div class="col-sm-6 offset-sm-3">
                                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </main>

</body>
</html>>