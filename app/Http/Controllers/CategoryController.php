<?php

namespace App\Http\Controllers;

use App\Category;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class CategoryController extends Controller
{
    //
    public function index(){
        $cat = Category::all();
        return view('category.index',compact('cat'));
    }
    public function indexNew(){
        return view('category.new');
    }

    public function Create(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'normalprice' => 'required_with:lowprice',
            'lowprice' => 'required_with:normalprice',
        ],[
            'name.unique'=>'This category already exits.'
        ]);

        $cat = new Category();
        $cat->name = $request->input('name');
        $cat->made_by_id = auth()->user()->id;
        if($request->input('normalprice') === '' && $request->input('lowprice') === ''){
            $cat->normal_price = config('app.default_normal_price');
            $cat->low_price = config('app.default_low_price');
        }else{
            $cat->normal_price = $request->input('normalprice');
            $cat->low_price = $request->input('lowprice');
        }

        $cat->save();
        return redirect('/category');
    }

    public function DelCategory(Request $request){
        try{
            $cat = Category::findorFail($request->input('id'));
            $cat->delete();

            Alert::success('Category #'.$request->input('id').' has been deleted.!','Successfully')->autoclose(4000);
            return redirect()->back();
        }catch (Exception $e){
            Alert::success('Permission Denied','error')->autoclose(4000);
            return redirect()->back();
        }

    }

}
