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
        $curr_user->user_type = ($req->input('user_type'));
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
            $data[$i]->score = ($data[$i]['cgpa']*100+$data[$i]['amcat_aptitude']+$data[$i]['amcat_english']+$data[$i]['amcat_coding_score'])/4;
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
        $total_count = 0;
        $company_data = array();
        if($count!=0){
        for($i=0;$i<$count-1;$i++){
            if($arr[$i] == $arr[$i+1]){
                $temp++;
            }else{
                $percentage = round(($temp/$count)*100);
                $company_data[] = array(
                    'company_id' => $i+1,
                    'company_name' => $arr[$i],
                    'company_count' => $percentage,
                );
                $temp = 1;
            }
        }
        $percentage = round(($temp/$count)*100);
        $company_data[] = array(
            'company_id' => $i+1,
            'company_name' => $arr[$i],
            'company_count' => $percentage,
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
        $student->cgpa = $req->input('cgpa');
        $student->amcat_aptitude = $req->input('amcat_aptitude');
        $student->amcat_english = $req->input('amcat_english');
        $student->amcat_coding_score = $req->input('amcat_coding_score');
        $student->package = $req->input('package');
        $student->save();
        $req->session()->flash('status','Company Added Successfully');
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
        // return "Correct";
        return redirect('/list_graph');
        }else{
            return $req->input('password')." ".$user[0]->email." ".Crypt::decrypt($user[0]->password);
        }
    }
    function about(Request $req)
    {
        $email = student::where('name',Session::get('user'))->get()->pluck('email')->first();
        $user_details = placement::where('email',$email)->get()->first();
        $cgpa = $user_details->cgpa;
        $amcat_aptitude = $user_details->amcat_aptitude;
        $amcat_english = $user_details->amcat_english;
        $amcat_coding_score = $user_details->amcat_coding_score;
        $total_score = $cgpa + $amcat_aptitude + $amcat_english + $amcat_coding_score;
        return view('about',["data" => $total_score]);
    }
    function analysis(Request $req)
    {
        $student_details = placement::all();
        $return_data = [];
        $sum_xy = 0;
        $sum_x = 0;
        $sum_y = 0;
        $sum_x2 = 0;
        $count = sizeof($student_details);
        foreach($student_details as $key=>$value){
            $cgpa = $value->cgpa;
            $amcat_aptitude = $value->amcat_aptitude;
            $amcat_english = $value->amcat_english;
            $amcat_coding_score = $value->amcat_coding_score;
            $total_score = ($cgpa*100 + $amcat_aptitude + $amcat_english + $amcat_coding_score)/4;
            $package = $value->package;
            $sum_xy += ($total_score* $package);
            $sum_x += $total_score;
            $sum_y += $package;
            $sum_x2 += ($total_score*$total_score);
            $return_data[$key]['total_score'] = $total_score;
            $return_data[$key]['package'] = $package;
        }
        $M = (($count*$sum_xy) - ($sum_y*$sum_x))/(($count*$sum_x2) - ($sum_x*$sum_x));
        $C = ($sum_y/$count) - $M*($sum_x/$count);
        $return_data[0]['M'] = $M;
        $return_data[0]['C'] = $C;
        $user_type = student::where('name',Session::get('user'))->get()->pluck('user_type')->first();
        $return_data[0]['user_type'] = $user_type;
        if($user_type == 0){
            $email = student::where('name',Session::get('user'))->get()->pluck('email')->first();
            $user_details = placement::where('email',$email)->get()->first();
            $cgpa = $user_details->cgpa??0;
            $amcat_aptitude = $user_details->amcat_aptitude??0;
            $amcat_english = $user_details->amcat_english??0;
            $amcat_coding_score = $user_details->amcat_coding_score??0;
            $total_score = ($cgpa*100 + $amcat_aptitude + $amcat_english + $amcat_coding_score)/4;
            if($total_score == 0){
                $return_data[0]['package'] = 0;
            }else{
            $package = $M*$total_score + $C;
            $return_data[0]['package'] = $package;
            }
        }
        return view('analysis',["data" => $return_data]);
    }
    function upload(Request $req)
    {
        $result = $req->file('file')->store('apiDocs');
        return ["result" => $result];
    }
}
