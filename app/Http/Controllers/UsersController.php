<?php

namespace App\Http\Controllers;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function show($id){
        return view('users.show')->withUser(User::findOrFail($id));

    }

    public function create(){
        return view('users.register');
    }


    public function register(Request $request){
        $this->validate($request,[
        'email' =>'required',
        'password' =>'required',
        'name' =>'required',
        'telp' =>'required',
        'ville' =>'required',
        'image' =>'required',
    ]);
        $name ='';
        if($request->hasFile('image')){
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'),$name);
        }

       User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'telp' => $request->telp,
           'ville' => $request->ville,
           'image' =>'/images/'.$name
        ]);
        return \redirect()->route('users.login')->with([
            'success' =>'Compte créér'
        ]);

    }


    public function login(){
        return view('users.login');
    }

    public function auth(Request $request){
    $this->validate($request,[
        'email' => 'required',
        'password' => 'required'
    ]);
    if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
        return \redirect()->route('cars.index');
    }else{
        return \redirect()->route('users.login')->with([
            'error' =>'Email ou mot de passe est incorrect'
        ]);
    }
    }
    public function logout(){
        auth()->logout();
        return \redirect()->route('cars.index');
    }
}
