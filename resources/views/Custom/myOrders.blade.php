<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Customer DashBoard</title>
</head>
<body>
    @if(session()->get('name'))
    <div class="container text-center">
        <h1 class="text-white bg-primary text-center w-75 mt-4">E-Store</h1>
        <div class="border border-dark w-75">
            <div class="d-flex justify-content-around flex-row bg-info ">
                <span class="p-2 text-white"><a href="/dashboardC" class="text-white">{{session()->get('name')}}</a></span>
                <a href="/placeorder" class="p-2 text-white">Place Order</a>
                <a href="/myOrder" class="p-2 text-white">myOrder</a>
                <a href="/logout" class="p-2 text-white">logout</a>
            </div>
        </div>

        <div class="border border-dark w-75"style="height: 500px;">
                <h2 class="fs-3 text-center mt-2 mb-2">Welcome to the Customer DashBoard</h2>
                 <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Detail</th>
                        <th>Price</th>
                        <th>Delivery Person</th>
                    </tr>
                    @foreach($data as $datas)
                    <tr>
                        <td>{{$datas->id}}</td>
                        <td>{{$datas->name}}</td>
                        <td>{{$datas->details}}</td>
                        <td>{{$datas->price}}</td>
                        <td>{{$datas->ename}}</td>
                        @if($datas->status=='diliver')
                        <td>Dilivered</td>
                        @elseif($datas->status=='cancel')
                        <td>Cancelled</td>
                        @elseif($datas->status=='on')
                        <td><a href="/orderCancel/{{$datas->id}}" class="btn btn-success">Cancel Order</a></td>
                        @endif
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
