    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=	, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center text-primary bg-primary text-white mt-5 w-75">E-Store</h1>

            <form action="/dashboard" method="post" class="border border-primary text-center w-75" style="height:350px;">
            {{ csrf_field() }}
            @foreach($errors->all() as $error)
            <div class="alert alert-danger w-50 m-auto mt-2" role="alert">
            {{ $error}}
            </div>
            @endforeach
            <br><br><br>
                Email: <input type="email" name="email" class="form-format m-auto" value="{{old('name')}}"><br><br>
                Password: <input type="password" name="password" class="form-format m-auto"><br><br>
                <input type="submit" value="Log In" name="login" class="btn btn-primary"><br><br>
            </form>
            <div class="border border-primary text-center mt-3 w-75"><a href="/reg" class="btn btn-primary mt-1 mb-1 w">Register Now!</a></div>
        </div>
    </body>
    </html>
