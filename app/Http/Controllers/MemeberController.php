<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MemeberController extends Controller
{
    public function loginCheck(Request $request)
    {

        $this->validate($request , [
            'email'=> 'required',
            'password'=> 'required'
        ]);
        //dd($request->all());
        $email = $request->email;
        $password = $request->password;

        $data=Members::where('email',$email)->first();
        $email1 = $data->email;
        $pass = $data->password;
        $role = $data->role;

        session()->put('name',$data->name);
        session()->put('id',$data->id);
        session()->put('address',$data->address);
        session()->put('tp',$data->tp);

        if($email1== $email && Hash::check($password,$pass)){
            if($role=='emp')
            {
                return view('/Employee/EmployeeDashbord');
            }
            else if($role=='customer')
            {
                return view('/Custom/customerDash');
            }else
            {
            return view('dashboardMember');
            }
        }else{
            // $report="Email or Password is Wrong..";
            return redirect()->bacK();
        }
    }

    public function regMember(Request $request){
        $this->validate($request,[
            'name'=> 'required|min:5',
            'email'=>'required',
            'gender' => 'required',
            'address' => 'required|max:198|min:4',
            'tp'=>'required|max:10|min:10',
            'pw'=>  ['required',
                    'min:8',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/' // must contain a special character
                    ]

        ]);
        //dd($request->all());
        $data= new Members;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->gender=$request->gender;
        $data->address=$request->address;
        $data->tp=$request->tp;
        $data->role = $request->role;
        $data->password = Hash::make($request->pw);

        $data->save();

        return redirect()->back();

    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
    //------------------------------------------------------------------------------------------
    public function setEmployee()
    {
        $data = Members::where('role','emp')->get();

        return view('employee')->with('data',$data);
    }

    public function addEmployee(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:30',
            'email'=>'required',
            'address'=>'required',
            'tp'=> 'required|max:10',
            'pw'=>  ['required',
                    'min:8',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/' // must contain a special character
                    ]
        ]);

        $data = new Members;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->tp = $request->tp;
        $data->role = $request->role;
        $data->password = Hash::make($request->pw);
        $data->save();

        return redirect()->bacK();
    }
    public function showEmployee($id)
    {
        $data = Members::find($id);

        return view('showEmployee')->with('data',$data);
    }
    public function setupdateEmployee($id)
    {
        $data = Members::find($id);

        return view('updateEmployee')->with('data',$data);
    }

    public function updateEmp(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:30',
            'email'=>'required',
            'address'=>'required',
            'tp'=> 'required|max:10',
            'pw'=> 'required'
        ]);

        $id =$request->id;
        $data = Members::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->tp = $request->tp;
        $data->password = Hash::make($request->pw);
        $data->save();

        $data = Members::where('role','emp')->get();
        return view('employee')->with('data',$data);
    }

    public function deleteEmp($id)
    {
        $data = Members::find($id);
        $data->delete();


        $data = Members::where('role','emp')->get();
        return view('employee')->with('data',$data);

    }
    public function setPw(Request $request)
    {
        $this->validate($request,[
            'pPw'=>'required',
            'nPw1'=>['required',
                    'min:8',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/' // must contain a special character
                    ],
            'nPw2'=>['min:8',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                    'required_with:nPw1',
                    'same:nPw1'
                    ]
        ]);
        $id = session()->get('id');
        $data = Members::where('id',$id)->first();
        $pass = $data->password;
        $password = $request->pPw;
        $npass =$request->nPw1;
        if(Hash::check($password,$pass))
        {
            $data->password = Hash::make($npass);
            $data->save();
            return view('/Employee/resetPw')->with('data','Password Succesfully Change');
        }else{
            return view('/Employee/resetPw')->with('data','Current Password Invalid.');
        }

    }

}
