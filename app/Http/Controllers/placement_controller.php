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
    //for displaying list of all companies
    function list()
    {

        $data = placement::all();
        $email = student::where('name',Session::get('user'))->get()->pluck('email');
        $count = $data->count();
        for($i=0;$i<$count;$i++){
            $data[$i]->id = $i+1;
        }
        return view('list',compact('data','email'));
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
        $email = student::where('name',$student->name)->pluck('email');
        $student->email = $email[0];
        $student->company_name = $req->input('company_name');
        $student->joining_month = $req->input('joining_month');
        $student->profile = $req->input('profile');
        $student->save();
        $req->session()->flash('status',$student->email);
        return redirect('list');
        }else{
            $req->session()->flash('status','Please register or login FIRST');
            return redirect('register');
        }
    }
    function delete($email)
    {
        placement::where('email',$email)->delete();
        Session()->flash('status','Company Deleted Successfully');
        return redirect('list');
    }
    function edit($email)
    {
        $data=placement::where('email',$email)->get()->first();
        return view('edit',["data"=>$data]);
        // print_r($data);
    }
    public function update(Request $req)
    {
        $student=placement::where('email',$req->input('email'))->get()->first();

        $student->company_name = $req->input('company_name');
        $student->joining_month = $req->input('joining_month');
        $student->profile = $req->input('profile');
        $student->save();
        $req->session()->flash('status','Updated Successfully!');
        return redirect('list');
        // return $req->input("email");
    }
    function login(Request $req)
    {
        $req->validate([
            'email' => 'required | email',
            'password' => 'required | min : 5'
        ]);
        $user = student::where('email',$req->input('email'))->get();
        if(Crypt::decrypt($user[0]->password) == $req->input('password')){
        $req->session()->put('user',$user[0]->name);
        return redirect('/');
        }else{
            return "Password Not Correct. You entered ".Crypt::decrypt($user[0]->password);
        }
    }
}
