<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstcontrollerpage extends Controller
{
    public function signin()
    {
        $mes="";
        return view("sign-in-up.signin")->with('data',$mes);
    }
    public function loginform(Request $request)
    {
        $validate=$request->validate([

             'uname'=>'required',
             'password'=>'required'
        ],
        [
            'uname.required'=>'Please put your user id',
            'password.required'=>'Please put your password'
        ]
        
        );
        $username=$request->uname;
        $password=$request->password;
        $user="";
        $data="";
        $result="ok";
        $mes="";

        $data=["Dipta saha"=>"12345","Rony saha"=>"123456","Jony saha"=>"1234567"];
            foreach ($data as $key => $value) {
                if($username==$key && $password==$value )
                {
    
                    $user=$username;
                    return view("userview.homepage",['user'=>$user]);
                    
    
                }
                else {
                    $data="ok";
                }

              
            }
            if ($result==$data) {
                $mes="user name password not match";
                return view("sign-in-up.signin")->with('data',$mes);
            }
        
        
        
    }

    public function signup()
    {
        return view("sign-in-up.signuppage");
    }

    public function sigpupform(Request $request)
    {
        $validate=$request->validate([

            'Firstname'=>'required|regex:/^[a-zA-Z]+$/u|max:100',
            'LastName'=>'required|regex:/^[a-zA-Z]+$/u|max:100',
            'phone'=>'required|numeric|min:11',
            'address'=>'required',
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/',
            'cpassword'=>'required_with:password|same:password'
            
       ],
       [
           'Firstname.required'=>'Please put your Firstname',
           'Firstname.regex'=>'Please put Only letter',
           'LastName.required'=>'Please put your Lastname',
           'LastName.regex'=>'Please put Only letter',
           'phone.required'=>'Please put your Phone number',
           'phone.numeric'=>'Please put Number',
           'phone.min'=>'Please put only 11 digits',
           'address.required'=>'Please put your Address',
           'username.required'=>'Please put your username',
           'username.unique'=>'username is alrealy exists',
           'email.required'=>'Please put your Email',
           'password.min'=>'Please least 8 or more characters',
           'password.regex'=>'number,uppercase,lowercase letter must',
           'password.required'=>'Please put 8 special character password',
           'cpassword.same'=>'confirm Password not match',
           

           
           
       ]
       
       );
       return "ok";
    }
}
