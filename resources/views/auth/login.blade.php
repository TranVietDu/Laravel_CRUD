<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="../assetsauth/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="login-form">
        <form action="/login" method="post">
        {{ csrf_field() }}
            <h2 class="text-center">Login</h2>
            <div class="form-group has-error">
                <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                <i style="float: left;" class="text-danger">{{ $errors->first('email') }}</i>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <i style="float: left;" class="text-danger">{{ $errors->first('password') }}</i>
            </div>
            @if (session('message'))
                <p style="color: red;">{{session('message')}}</p>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </div>
            <p><a href="#">Lost your Password?</a></p>
        </form>
        <p class="text-center small">Don't have an account? <a href="/register">Sign up here!</a></p>
    </div>
</body>
</html>