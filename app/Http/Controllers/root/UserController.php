<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Validator;
use Auth;
use Session;
use App\Attendance;
use Carbon;
use App\User;


class UserController extends Controller
{
    

       

       public function index()
       {
                
           $users = User::activated_user();
           return view('root.accounts.index', ['users' => $users]);

       }

       public function create()
       {


        return view('root.accounts.create');
       }


      public function store(Request $request)
      {
          
      
        $this->validate($request, ['first_name'=>'required', 'last_name' => 'required','middle_name'=>'required', 'username' => 'required|unique:users', 'password' => 'required|min:8', 'email' => 'required|unique:users']);
  


        $user = new User();

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->middle_name =request('middle_name');
        $user->email = request('email');
        $user->status = '1'; 
        $user->username = request('username');
        $user->password= bcrypt(request('password'));
        $user->save();



        $request->session()->flash('message_create', 'Sucessfully Created new Account');
        return redirect('admin/accounts')->withInput();

      }


      public function deactivate(Request $request, $id)
      {

       $user = User::find($id);

       $user->status = "0";
       $user->save();

       $request->session()->flash('message_create', 'Sucessfully Deactivated Account');
        return redirect('admin/accounts');
          
      }

      public function activate(Request $request, $id)
      {

       $user = User::find($id);

       $user->status = "1";
       $user->save();

       $request->session()->flash('message_activate', 'Sucessfully Activated Account');
        return redirect('admin/accounts/deactivated');
          
      }


      public function deactivated_accounts()

      {


 
        
        $users = User::deactivated_user();
       
        return view('root.accounts.deactivated',['users' => $users]);
      }
   




}
