<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\article\ArticleController;
use App\Profile;
use App\User;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use UxWeb\SweetAlert\SweetAlert;
use Alert;
use Setting;

class ProfileController extends Controller
{
    //
    public function index(){
        $user = User::find(Auth::id());
        $ProfileReport = (new ArticleController());
        $ProfileReport = $ProfileReport->ArticlesInfo();
        return view('profile',compact('user','ProfileReport'));
    }



    public function SetAvatar(Request $request){
        $file = $request->file('avatar');
        $image_name = time()."-".$file->getClientOriginalName();
        $url = 'uploads/avatars/'.Auth::id()."/";
        $file->move($url, $image_name);
        $image = Image::make(sprintf($url.'%s', $image_name))->resize(100, 100)->save();
        Profile::where('user_id',Auth::id())->update(['avatar' => url('/'.$url.$image_name)]);;
        return redirect()->back();
    }

    public function ChangePassword(Request $request){
        $user = User::find(Auth::id());
        $this->validate($request, [
            'password' => 'required|min:6',
            'new_password' => 'required|same:repeat_password',
            'repeat_password' => 'required',
        ]);
        if (Auth::attempt(['email' => $user->email, 'password' => $request->input('password')])) {
            auth()->user()->fill([
                'password' => bcrypt($request->input('new_password'))
            ])->save();
            Alert::success('Your Password has been changed');
            return redirect()->back();
        }else{
            Alert::error('Authentication failed.!');
            return redirect()->back();
        }
    }


    public function DeleteUser(){
        User::find(Auth::id())->delete();
        return redirect()->back();
    }

    public function SetEmailNotification(Request $request){
        $s = setting()->set('email_notifications', $request->input('prefer'));
        setting()->save($s);
        return redirect('/profile#notification-settings');
    }

    public function ActivateAccount($code){
        try{
            $email = base64_decode($code);
            $user = User::where('email',$email);
            if($user->count() === 1){
                $user->update(['activated' => '1']);
                return redirect('/profile');
            }else{
                Alert::error('Your Confirmation code has been expired.!');
                return redirect('/login');
            }

        }catch (Exception $e){
            Alert::error('Authentication failed.!');
            return redirect('/login');
        }

    }


}
