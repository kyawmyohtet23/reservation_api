<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        {{-- bootstrap --}}
        <link rel="stylesheet" href={{ asset('bootstrap/dist/css/bootstrap.min.css') }}>

        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href={{ asset('js/plugins/nucleo/css/nucleo.css') }} rel="stylesheet" />
    <link href={{ asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }} rel="stylesheet" />
  
      {{-- argon css --}}
      <link href={{ asset('css/argon-dashboard.css?v=1.1.2') }} rel="stylesheet" />


      <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(rgb(56, 189, 248), rgb(186, 230, 253));
        }


      </style>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card p-4 rounded-sm bg-secondary">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="{{ route('login') }}" method="POST">
                        <!-- Your registration form fields go here -->
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
    
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
    
                        <button type="submit" class="btn btn-primary w-100 text-center">Login</button>
                    </form>
                    <small class="my-1 text-center">Don't have an account? <a href="{{ route('register#page') }}" class="text-danger text-decoration-underline">Register</a></small>
                </div>
            </div>
        </div>
    </div>



    <script src={{ asset('js/plugins/jquery/dist/jquery.min.js') }}></script>
    <script src={{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}></script>
    <!--   Optional JS   -->
    <script src={{ asset('js/plugins/chart.js/dist/Chart.min.js') }}></script>
    <script src={{ asset('js/plugins/chart.js/dist/Chart.extension.js') }}></script>
    <!--   Argon JS   -->
    <script src={{ asset('js/argon-dashboard.min.js?v=1.1.2') }}></script>
</body>
</html>