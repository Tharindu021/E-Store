<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Employee DashBoard</title>
</head>
<body>
    @if(session()->get('name'))
    <div class="container text-center">
        <h1 class="text-white bg-primary text-center w-85 mt-4">E-Store</h1>
        <div class="border border-dark w-85">
            <div class="d-flex justify-content-around flex-row bg-info ">
                <span class="p-2 text-white"><a href="/EmployeeDashbord" class="text-white">{{session()->get('name')}}</a></span>
                <a href="/resetPw" class="p-2 text-white">Reset Password</a>
                <a href="/myorders" class="p-2 text-white">My Order</a>
                <a href="/logout" class="p-2 text-white">logout</a>
            </div>
        </div>

        <div class="border border-dark w-85"style="height: 500px;">
                <h2 class="text-center mt-2 fs-3 ">Reset Your Password</h2>
                <form method="post" action="/setPw" class="form-control" >
                    {{ csrf_field() }}
                    @if(isset($data))
                        <p class="alert alert-danger">{{$data}}</p>
                    @endif
                    @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                    <br><br>
                    Current Password:<input type="password" name="pPw" class="form-control"><br><br>
                    New Password: <input type="password" name="nPw1" class="form-control"><br><br>
                    Confirm New Password: <input type="password" name="nPw2" class="form-control"><br>
                    <input type="submit" name="change" value="Change">
                </form>
        </div>
    </div>
    @else
    <div class="container text-center">
        <h1 class="text-white bg-primary text-center w-75 mt-4">E-Store</h1>
        <div class="border border-dark w-75"style="height: 500px;">
                <h2 class="text-center mt-5 ">Please Login</h2>
                    <a href="/" class="btn btn-warning">Log In</a>
        </div>
    </div>

    @endif
</body>
</html>
