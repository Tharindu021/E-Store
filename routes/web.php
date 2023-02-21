<?php

use App\Http\Controllers\MemeberController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\ProductContraller;
use Illuminate\Support\Facades\Route;
use App\Models\Members;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function () {
    return view('index');
});
Route::get('/reg', function () {
    return view('reg');
});
Route::get('/dashboardM',function ()
{
    return view('dashboardMember');
});
Route::get('/eDashbord', function()
{
    return view('/Employee/EmployeeDashbord');
});
Route::get('/dashbordC', function ()
{
    return view('/Custom/customerDash');
});
Route::get('/resetPw', function () {
    return view('/Employee/resetPw');
});
Route::get('/addproduct',function (){
    return view('addproduct');
});
Route::get('/addemployee',function (){
    return view('addemployee');
});

Route::get('/logout', [MemeberController::class, 'logout']);
Route::get('/employee', [MemeberController::class, 'setEmployee']);
Route::get('/showProduct/{id}',[ProductContraller::class, 'showProduct']);
Route::get('/deleteProduct/{id}', [ProductContraller::class, 'deleteProduct']);
Route::get('/updateProduct/{id}', [ProductContraller::class, 'updateProduct']);
Route::get('/showEmp/{id}',[MemeberController::class, 'showEmployee']);
Route::get('/updateEmployee/{id}', [MemeberController::class, 'setupdateEmployee']);
Route::get('/deleteEmp/{id}', [MemeberController::class, 'deleteEmp']);
Route::get('/placeorder', [ProductContraller::class, 'placeOrder']);
Route::get('/setPlaceOrder/{id}', [ProductContraller::class, 'setValues']);
Route::get('/myorders', [orderController::class, 'setOrders']);
Route::get('/products',[ProductContraller::class, 'setProduct']);
Route::get('/orderCancel/{id}',[orderController::class, 'orderCancel']);
Route::get('/diliver/{id}',[orderController::class, 'setDiliver']);
Route::get('/myOrder',[orderController::class, 'setOrderCustomer']);


Route::post('/dashboard' , [MemeberController::class, 'loginCheck']);
Route::post('/regmem' , [MemeberController::class, 'regMember']);
Route::post('/addProduct', [ProductContraller::class, 'AddProduct']);
Route::post('/enrEmployee', [MemeberController::class, 'addEmployee']);
Route::post('/updateProd',[ProductContraller::class, 'setUpdateProduct']);
Route::post('/updateEmp',[MemeberController::class, 'updateEmp']);
Route::post('/order', [orderController::class, 'order']);
Route::post('/setPw',[MemeberController::class, 'setPw']);
