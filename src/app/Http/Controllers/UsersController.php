<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function login(Request $request){

        $email = $request->email;
        $password = $request->password;
        $users = User::where('email', '=', $email)->where('password', '=', $password)->first();
        if(@$users -> cod_util != null){

            //utilizador válido
            @session_start();
            $_SESSION['id']=$users->cod_util;
            $_SESSION['name']=$users->nome;
            $courses=Course::orderby('name', 'asc')->paginate();
            return view('courses.index', ['courses'=>$courses]); 
        }
            //não existe utilizador com este login
        else{
            echo "<script>
            window.alert('Incorrect Data')
            
            </script>";
        }
        return view('courses.index');
    }

    public function logout(){

        @session_start();
        @session_destroy();
        return view('welcome');
    }
}
