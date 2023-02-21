<h1 class="text-white bg-primary text-center w-75 mt-4">E-Store</h1>
        <div class="border border-dark w-75">
            <div class="d-flex justify-content-around flex-row bg-info ">
                <span class="p-2 text-white"><a href="/dashboardM" class="text-white">{{session()->get('name')}}</a></span>
                <a href="/products" class="p-2 text-white">Products</a>
                <a href="/employee" class="p-2 text-white">Employee</a>
                <a href="/logout" class="p-2 text-white">logout</a>
            </div>
        </div>
