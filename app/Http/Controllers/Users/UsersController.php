<?php

namespace App\Http\Controllers\Users;

use App\Profile;
use App\User;
use Dompdf\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Alert;

class UsersController extends Controller
{
    //
    public function Index(){
        $users = User::orderBy('created_at', 'desc')->get();
        return view('users-management.view',compact('users'));
    }

    public function NewIndex(){
        return view('users-management.create');
    }

    public function Create(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' =>  'required',
            'is_admin' => 'required',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->verification_code = '';
        $user->settings = '';
        $user->is_admin = $request->input('is_admin');
        $user->save();

        $profile = new Profile(); // fill the empty profile
        $profile->user_id = $user->id;
        $profile->avatar = config('app.defaultPplaceholder');
        $profile->save();

        Alert::success('User '.$request->input('name').' has been created successfully.!')->autoclose(3500);
        return redirect('/users');
    }

    public function DeleteUser(Request $request){
        try{
            $user = User::findOrFail($request->input('id'));
            Alert::success('User '.$user->name.' has been deleted from record.!')->autoclose(3500);
            $user->delete();

            return redirect()->back();
        }catch (Exception $e){
            Alert::error('Permission Denied')->autoclose(3500);
            return redirect()->back();
        }
    }

    public function ResetPassword(Request $request){
        try{
            $user = User::findOrFail($request->input('id'));
            $user->password = Hash::make($request->input('password'));
            $user->save();
            Alert::success('User '.$user->name.' password has been changed.!')->autoclose(3500);
            return redirect()->back();
        }catch (Exception $e){
            Alert::error('Permission Denied')->autoclose(3500);
            return redirect()->back();
        }

    }

}
