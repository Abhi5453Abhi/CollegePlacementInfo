<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\placement;
use App\Models\User;
use Session;
use Crypt;
use Illuminate\Support\Facades\DB;

class placement_controller extends Controller
{
    //for displaying list of all companies
    function list()
    {
        $data = placement::all();
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
                // echo $arr[$i] . " " . $temp;
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
        $student->name = Session::get('user');
        $users = User::all()->pluck('email')->where('name',$student->name);
        $student->email = $users;
        $student->company_name = $req->input('company_name');
        $student->save();
        $req->session()->flash('status','Company Added Successfully');
        return redirect('list');
    }
    function delete($id)
    {
        placement::find($id)->delete();
        Session()->flash('status','Company Deleted Successfully');
        return redirect('list');
    }
    function register(Request $req)
    {
        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->contact = $req->input('contact');
        $user->password = Crypt::encrypt($req->input('password'));
        $user->save();
        $req->session()->put('user',$req->input('name'));
        return redirect('/');
    }
}
