<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\placement;
use App\Models\student;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;

class placement_controller extends Controller
{
    //for displaying list of all companies
    function list()
    {
        $data = placement::all();
        $student_data = student::all()->get('name');
        $count = $data->count();
        for($i=0;$i<$count;$i++){
            $name = $data[$i]->name;
            $email = student::where('name',$name)->pluck('email')->first();
            $data[$i]->email = $email;
        }
        return view('list',["data"=>$data]);
    }
    function list_graph()
    {
        $data = placement::all();
        $arr = array();
        $count = $data->count();
        for($i=0;$i<$count;$i++){
            array_push($arr,$data[$i]['company_name']);
        }
        sort($arr, 0);
        $temp = 1;
        $company_data = array();
        if($count!=0){
        for($i=0;$i<$count-1;$i++){
            if($arr[$i] == $arr[$i+1]){
                $temp++;
            }else{
                $company_data[] = array(
                    'company_id' => $i+1,
                    'company_name' => $arr[$i],
                    'company_count' => $temp,
                );
                $temp = 1;
            }
        }
        $company_data[] = array(
            'company_id' => $i+1,
            'company_name' => $arr[$i],
            'company_count' => $temp,
        );
    }
        return view('list_graph',["data"=>$company_data]);
    }

    //for adding a company name
    function add(Request $req)
    {
        $student = new placement;
        $student->name = null;
        $student->name = Session::get('user');
        if($student->name != null){
        $student->email = student::all()->pluck('email')->where('name',$student->name);
        $student->company_name = $req->input('company_name');
        $student->save();
        $req->session()->flash('status','Company Added Successfully');
        return redirect('list');
        }else{
            $req->session()->flash('status','Please register or login FIRST');
            return redirect('register');
        }
    }
    function delete($id)
    {
        placement::find($id)->delete();
        Session()->flash('status','Company Deleted Successfully');
        return redirect('list');
    }
    function register(Request $req)
    {
        $req->validate([
            'name' => 'required | max : 20',
            'email' => 'required | email',
            'password' => 'required | min : 5'
        ]);
        $curr_user = new student;
        $curr_user->name = $req->input('name');
        $curr_user->email = $req->input('email');
        $curr_user->password = Crypt::encrypt($req->input('password'));
        $curr_user->save();
        $req->session()->put('user',$req->input('name'));
        return redirect('/');
    }
    function login(Request $req)
    {
        $req->validate([
            'email' => 'required | email',
            'password' => 'required | min : 5'
        ]);
        $user = student::where('email',$req->input('email'))->get();
        $req->session()->put('user',$user[0]->name);
        return redirect('/');
    }
}
