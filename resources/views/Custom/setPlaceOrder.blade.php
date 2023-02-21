<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Place Order</title>
</head>
<body>
    @if(session()->get('name'))
    <div class="container text-center">
        <h1 class="text-white bg-primary text-center w-75 mt-4">E-Store</h1>
        <div class="border border-dark w-75">
            <div class="d-flex justify-content-around flex-row bg-info ">
                <span class="p-2 text-white"><a href="/dashboardM" class="text-white">{{session()->get('name')}}</a></span>
                <a href="/placeorder" class="p-2 text-white">Place Order</a>
                <a href="/myOrder" class="p-2 text-white">myOrder</a>
                <a href="/logout" class="p-2 text-white">logout</a>
            </div>
        </div>
        <div class="border border-dark w-75"style="height: 500px;">
                <h2 class="text-black">Place the Order</h2>
                <form  action="/order" method="post" class="form-format w-50 m-auto ">
                    {{ csrf_field() }}

                    <br><br>
                    <input type="hidden" name="details" value="{{$data['product']->detail}}">
                    <input type="hidden" name="date" value="{{ now()->format('Y-m-d') }}">

                    Name:<input class="form-control align-content-center " type="text" id="disabledInput" name="pname" value="{{$data['product']->name}}"><br><br>
                    Employee Name:<select class="form-control" name="ename">
                            @foreach($data['employee'] as $datas['employee'])
                                <option value="{{$datas['employee']->name}}">{{$datas['employee']->name}}</option>
                            @endforeach
                            </select>
                    <input type="hidden" name="cname" value="{{session()->get('name')}}">
                    <input type="hidden" name="address" value="{{session()->get('address')}}">
                    <input type="hidden" name="tp" value="{{session()->get('tp')}}">
                    <br><br>
                    Price:<input type="text" class="form-control" id="disabledInput" name="price" value="{{$data['product']->price}}"><br>
                    <input type="submit" name="Update" value="Order" class="btn btn-primary">

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
