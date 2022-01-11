<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Register</title>
    <link rel="stylesheet" href="./assetsauth/register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="signup-form">
        <form action="/register" method="post">
            {{ csrf_field() }}
            <h2>Register</h2>
            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
            <div class="form-group">
                <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="UserName">
                <i class="text-danger">{{ $errors->first('name') }}</i>
            </div>
            <div class="form-group">
                <input type="email"  value="{{old('email')}}" class="form-control" name="email" placeholder="Email">
                <i class="text-danger">{{ $errors->first('email') }}</i>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <i class="text-danger">{{ $errors->first('password') }}</i>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                <i class="text-danger">{{ $errors->first('confirm_password') }}</i>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register Now</button>
            </div>
            
        </form>
        <div class="text-center">Already have an account? <a href="/login">Sign in</a></div>
    </div>
</body>

</html>