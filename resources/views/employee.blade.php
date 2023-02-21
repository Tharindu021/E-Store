<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Employee</title>
</head>
<body>
    @if(session()->get('name'))
    <div class="container text-center">
        @include('header')
        <div class="border border-dark w-75"style="height: 500px;">
            <a href="/addemployee" class="btn btn-success mt-4">Enroll New Employee</a>
                <table class="table">
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $datas)
                    <tr>

                        <td>{{$datas->id}}</td>
                        <td>{{$datas->name}}</td>
                        <td>{{$datas->email}}</td>
                        <td>{{$datas->tp}}</td>
                        <td><a href="/showEmp/{{$datas->id}}" class="btn btn-info">Show</a>&nbsp;<a href="/updateEmployee/{{$datas->id}}" class="btn btn-primary">Edit</a>&nbsp<a href="/deleteEmp/{{$datas ->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
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
