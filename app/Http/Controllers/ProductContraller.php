<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductContraller extends Controller
{
    public function AddProduct(Request $request)
    {
        $data = new Products;

        $this->validate($request,[
            'name'=> ' required|max:200',
            'details'=> 'required|max:200',
            'price' => 'required'
        ]);

        $name = $request->name;
        $details = $request->details;
        $price = $request->price;

        $data->name =$name;
        $data->detail = $details;
        $data->price = $price;
        $data->save();

        $details =Products::all();

        return view('products')->with('data',$details);
    }

    public function setProduct()
    {
        $data=Products::all();
        return view('products')->with('data',$data);
    }

    public function showProduct($id)
    {
        $data = Products::find($id);
        return view('showProduct')->with('data',$data);
    }

    public function deleteProduct($id)
    {
        $data= Products::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updateProduct($id)
    {
        $data= Products::find($id);

        return view('updateProduct')->with('data',$data);
    }

    public function setUpdateProduct(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'details'=>'required',
            'price'=>'required'
        ]);

        $id = $request->id;
        $data = Products::find($id);
        $data->name = $request->name;
        $data->detail = $request->details;
        $data->price =$request->price;

        $data->save();

        $data=Products::all();
        return view('products')->with('data',$data);
    }
    public function placeOrder()
    {
        $data = Products::all();

        return view('/Custom/placeOrder')->with('data',$data);
    }
    public function setValues($id)
    {
        $data['product'] = Products::find($id);
        $data['employee'] = Members::where('role','emp')->get();

        return view('/Custom/setPlaceOrder')->with('data',$data);

    }
}
