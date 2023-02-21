<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Members;

class orderController extends Controller
{
    public function order(Request $request)
    {
        $this->validate($request,[
            'ename' => 'required'
        ]);
        //dd($request->all());
        $data= new Orders;

        $data->pname=$request->pname;
        $data->details=$request->details;
        $data->price=$request->price;
        $data->address=$request->address;
        $data->tp=$request->tp;
        $data->date = $request->date;
        $data->ename = $request->ename;
        $data->cname = $request->cname;
        $data->status = 'on';

        $data->save();

        $data = Products::all();

        return view('/Custom/placeOrder')->with('data',$data);
    }

    public function setOrders()
    {
        $name = session()->get('name');
        $data = Orders::where('ename',$name)->get();

        return view('/Employee/myOrder')->with('data',$data);
    }
    public function orderCancel($id)
    {
        $data = Orders::find($id);
        $data->status = 'cancel';
        $data->save();

        return redirect()->back();
    }
    public function setDiliver($id)
    {
        $data = Orders::find($id);
        $data->status = 'diliver';
        $data->save();

        return redirect()->back();
    }
    public function setOrderCustomer()
    {
        $name=session()->get('name');
        $data = Orders::where('cname',$name)->get();

        return view('/Custom/myOrders')->with('data',$data);
    }
}
