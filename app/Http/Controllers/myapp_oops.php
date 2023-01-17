<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\client;
use App\Models\song;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class myapp_oops extends Controller
{
    public function home(Request $request){
        $search=$request['search'] ?? '';
        if($search!=''){
            $table=song::where('song_name','Like',"%$search%")->get();
        }
        else{
            $table= song::all();
        }
        $data=compact('table');
        return view('components.home')->with($data);
    }
    public function register(Request $request){
        $table=new song();
        $table->song_name=$request['name'];
        if($file=$request->file('img')){
            $name=$file->getClientOriginalName();
            if($file->move('uploads',$name)){
                $table->song_image='uploads/'.$name;
            }
        }
        if($pathfile=$request->file('path')){
            $path_name=$pathfile->getClientOriginalName();
            if($pathfile->move('uploads',$path_name)){
                $table->song_path='uploads/'.$path_name;
            }
        }
        $table->save();
        return redirect('/profile');
    }
    public function songPlay($id){
        $song=song::find($id);
        $data=compact('song');
        return view('components.song_play')->with($data);
    }
    public function login(){
        return view('auth.login');
    }
    public function registration(){
        return view('auth.registration');
    }
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:clients',
            'pwd'=>'required'
        ]);
        $client=new client();
        $client->name=$request['name'];
        $client->email=$request['email'];
        $client->password=Hash::make($request->pwd);
        $res=$client->save();
        if($res){
            return back()->with('success','you have registered successfully');
        }
        else{
            return back()->with('fail','something wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required',
            'pwd'=>'required'
        ]);
        $user=client::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->pwd, $user->password)){
                $request->session()->put('loginid',$user->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('fail','Password not matches.');
            }
        }else{
            return back()->with('fail','This email is not registered.');
        }
    }
    public function dashboard(){
        $data=array();
        if(session()->has('loginid')){
            $data=client::where('id','=',session()->get('loginid'))->first();
        }
        return view('auth.dashboard',compact('data'));
    }
    public function logout(){
        if(session()->has('loginid')){
            session()->pull('loginid');
            return redirect('/login');
        }
    }
    public function admin(){
        return view('admin.login');
    }
    public function admin_login(Request $request){
        $request->validate([
            'email'=>'required',
            'pwd'=>'required'
        ]);
        $admin=admin::where('email','=',$request->email)->first();
        if($admin){
            if(Hash::check($request->pwd,$admin->password)){
               $request->session()->put('adminId',$admin->id);
               return redirect('/profile');
            }
            else{
                return back()->with('fail','This password is invaild');
            }
        }
        else{
            return back()->with('fail','This email is not registered');
        }
    }
    public function admin_logout(){
        if(session()->has('adminId')){
            session()->pull('adminId');
            return redirect('/admin');
        }
    }
    public function profile(){
        $admin=array();
        if(session()->has('adminId')){
            $admin=admin::where('id','=',session()->get('adminId'))->first();
            $data=compact('admin');
        }
        return view('admin.profile')->with($data);
    }
}
