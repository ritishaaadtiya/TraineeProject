<?php

namespace App\Http\Controllers;
use App\Models\registration;
use Illuminate\Http\Request;

class home extends Controller
{
    //    
    public function display(){
        echo "This is my display function";
    }
 
    public function show(){
        $name = "ritisha";
        return view('show',compact('name'));
        // echo "this is show function";
    }
    # Add Data in the database
    public function addData(){
        registration::create([
          'username' => 'ritisha',
          'email' => 'rit@gmail.com',
          'password'=>'rit@123'
        ]);
        echo 'Registeration successful!';
    }


}

