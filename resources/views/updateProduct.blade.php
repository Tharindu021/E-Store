<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Updatee Employee</title>
</head>
<body>
    @if(session()->get('name'))
    <div class="container text-center">
        @include('header')
        <div class="border border-dark w-75"style="height: 500px;">
                <h2 class="text-black">Update Product Details</h2>
                <form  action="/updateProd" method="post" class="form-format w-50 m-auto ">
                    {{ csrf_field() }}

                    <br><br>
                    <input type="hidden" name="id" value="{{$data->id}}">
                    Name:<input class="form-control align-content-center " type="text" name="name" value="{{$data->name}}"><br><br>
                    Details:<input type="text" class="form-control" name="details" value="{{$data->detail}}"><br><br>
                    Price:<input type="text" class="form-control" name="price" value="{{$data->price}}"><br>
                    <input type="submit" name="Update" value="Upadte" class="btn btn-primary">

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
