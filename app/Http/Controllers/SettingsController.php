<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class SettingsController extends Controller
{
    //
    public function Index(){
        $settings = DB::table('app_settings')->get();
        return view('settings',compact('settings'));
    }


    public function update(Request $request){
        $this->validate($request, [
            'normalprice' => 'required',
            'lowprice' => 'required',
        ]);

        $bd = DB::table('app_settings')->update(['default_article_low_price' => $request->input('lowprice'), 'default_article_normal_price' => $request->input('normalprice')]);

        Alert::success('Settings has been updated.','successfully')->autoclose(4000);
        return  redirect()->back();

    }

}
