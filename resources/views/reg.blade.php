<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Registration</title>
</head>
<body>
    <div class="container-sm">
        <h1 class="text-white bg-primary text-center mt-4 w-50">Customer Registration</h1>

        @foreach($errors->all() as $error)
        <div class="alert alert-danger w-50" role="alert">
        {{ $error}}
        </div>
        @endforeach

        <form method="post" action="/regmem" class="border border-primary text-center text-bold w-50">
            {{ csrf_field() }}
            <br><br>
            <input type="hidden" name="role" value="customer">
            Name: <input type="text" name="name" class="form-control w-40" value="{{old('name')}}"><br><br>
            Email: <input type="email" name="email" class="form-control form w-40" value="{{old('email')}}"><br><br>
            Gender:<select name="gender" id="gender" class="form-control form w-40">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select><br><br>
            Address: <input type="text" name="address" class="form-control form w-40"><br><br>
            Mobile Number: <input type="text" name="tp" class="form-control form w-40"><br><br>

            Password:<p class="fs-7 text-warning">Minimum length 8 alpha-numeric characters having at least one lowercase letter,an uppercase letter,special character and a digit</p> <input type="password" name="pw" class="form-control form w-40"><br><br>
            <input type="submit" name="register" value="Register" class="btn btn-primary"><br><br>
            <a href="/" class="btn btn-success mb-3">Back To Log In Page</a>
        </form>
    </div>
</body>
</html>
