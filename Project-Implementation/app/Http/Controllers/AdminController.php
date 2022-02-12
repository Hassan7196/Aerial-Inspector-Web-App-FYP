<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function display(){

        return view('index');
    }
    public function login(Request $request){



        if($this->authentication($request->email,$request->password)){
           $name =  $this->findName($request->email);

           session(['name'=>$name]);

            return  view('index')->with('name',$name);
        }
        else{
            echo "Not successful";
        }


    }

    public function authentication($email,$password){

       $admin = admin::find($email);

       if ( $admin !=null){
           if ($admin->password == $password){
               return true;
           }
       }

       return false;


    }
    public function findName($email){

        return admin::find($email)->firstname;
    }
    public function index(){

        return view('login');
    }

    public function logOut(Request $request){



       $request->session()->forget('name');
        return view('login');
    }
}
