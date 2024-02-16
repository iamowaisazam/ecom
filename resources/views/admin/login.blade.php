<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins&display=swap" rel="stylesheet">
    <title>Login</title>

    <link href="{{asset('/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/css/style-responsive.css')}}" rel="stylesheet" />

    <style>
      .error{
        color: red!important;
      }
    </style>
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" method="POST" action="{{URL::to('/admin/login_submit')}}">
        @csrf
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="User Email" autofocus>
            @if($errors->has('email'))
            <p class="error" >{{ $errors->first('email') }}</p>
            @endif 

            <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
            @if($errors->has('password'))
             <p class="error" >{{ $errors->first('password') }}</p>
            @endif 
            <button class="btn btn-lg btn-login btn-block" type="submit">login</button>
        </div>
      </form>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('/admin/js/jquery.js')}}"></script>
    <script src="{{asset('/admin/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>