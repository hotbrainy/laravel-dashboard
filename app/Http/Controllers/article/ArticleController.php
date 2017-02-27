<?php

namespace App\Http\Controllers\article;

use App\Article;
use App\Category;
use App\Events\ArticleWasApproved;
use App\Events\ArticleWasSubmitted;
use App\Events\ArticleWasUsed;
use App\Profile;
use Composer\EventDispatcher\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;
use App\User;
use Alert;

class ArticleController extends Controller
{
    //

    public function index(){
        return view('myarticles');
    }

    public function ArticleShow($article_id){
        $article = Article::find($article_id);
        $user = User::find($article->user_id);
        $Profile = User::find($article->user_id)->Profile;
        return view('article_view',compact('article','user','Profile'));
    }

    public function ArticlesInfo(){
        $articles = User::find(Auth::id())->Articles;
        $report = array();
        $report['total_articles'] = 0;
        $report['total_paras_all_times'] = 0;
        $report['total_words_all_times'] = 0;
        $report['total_chars_all_times'] = 0;
        $report['total_pending'] = 0;
        $report['total_approved'] = 0;

        if($articles->count() > 0){

            foreach ($articles as $article){
                $report['total_articles'] = $report['total_articles'] + 1;
                $report['total_paras_all_times'] = $report['total_paras_all_times'] + $article->total_paras;
                $report['total_words_all_times'] = $report['total_words_all_times'] + $article->total_words;
                $report['total_chars_all_times'] = $report['total_chars_all_times'] + $article->total_chars;
                if($article->status === 'Pending'){
                    $report['total_pending']  = $report['total_pending'] + 1;
                }elseif($article->status === 'Approved'){
                    $report['total_approved']  = $report['total_approved'] + 1;
                }


            }
            return $report;
        }else{
            foreach ($articles as $article){
                $report['total_articles'] = $report['total_articles'] + 1;
                $report['total_paras_all_times'] = $report['total_paras_all_times'] + $article->total_paras;
                $report['total_words_all_times'] = $report['total_words_all_times'] + $article->total_words;
                $report['total_chars_all_times'] = $report['total_chars_all_times'] + $article->total_chars;
                if($article->status === 'Pending'){
                    $report['total_pending']  = $report['total_pending'] + 1;
                }elseif($article->status === 'Approved'){
                    $report['total_approved']  = $report['total_approved'] + 1;
                }
            }
            return $report;
        }

    }

    public function GetArticles()
    {
       $user = User::find(Auth::id());
        if($user->is_admin){
            $articles = Article::orderBy('created_at', 'desc')->get();
            $d = array();
            $i = 0;
            foreach ($articles as $article){
                $article['titlestriped'] = str_limit($article->title,30);
                $article['timeago'] = $article->created_at->diffForHumans();
                $i++;
            }

            return Datatables::collection($articles)->make(true);
        }else{
            $articles = Article::where('user_id',$user->id)->orderBy('created_at', 'desc')->get();
            $d = array();
            $i = 0;
            foreach ($articles as $article){
                $article['titlestriped'] = str_limit($article->title,30);
                $article['timeago'] = $article->created_at->diffForHumans();
                $i++;
            }
            return Datatables::collection($articles)->make(true);
        }

    }

    public function DeleteArticle(Request $request){
        try {
            $article = Article::findOrFail($request->input('article_id'));
            if($article->user_id === Auth::id() || User::find(Auth::id())->is_Admin){
                $article->delete();
                Alert::success('#'.$request->input('article_id').'  has Benn Deleted','Success')->autoclose(4000);
                return redirect('/article');
            }else{
                Alert::error('Permission Denied','Error')->autoclose(4000);
                return redirect('/article');
            }
        }
        catch (ModelNotFoundException $e) {
            // redirect we don't find record
            Alert::error('This Article all ready Deleted or Not found in our Records.','Error')->autoclose(4000);
            return redirect('/article');
        }

        return redirect('/article');
    }

    public function IndexComposer(){
            $category = Category::all();
            return view('composer',compact('category'));
    }

    public function IndexUpdator($article_id){
        try {
            $article = Article::findOrFail($article_id);
        }
        catch (ModelNotFoundException $e) {
            // redirect we don't find record
            Alert::error('This Article has been Deleted or Not found in our Records.','Successfully')->autoclose(4000);
            return redirect('/article');
        }
        $user = User::find(Auth::id());
        $category = Category::all();
        return view('articleupdator',compact('article','category','user'));
    }

    public function Store(Request $request){

        $this->validate($request, [
            'title' => 'required|max:70|min:15',
            'summary' => 'required|max:155|min:20',
            'cat' => 'required',
            'lang' => 'required',
            'composer' => 'required',
            'word_count' => 'required',
            'char_count' => 'required',
            'para_count' => 'required',
        ],[
            'title.required'=>'You cant leave Email field empty',
            'cat.required'=>'At lest select one Category',
        ]);

        $user = User::find(Auth::id());

        $cat =  implode(',', $request->input('cat')); // Reform Cat Data
        $article = new Article();
        $article->user_id = $user->id;
        $article->title = $request->input('title');
        $article->summary  = $request->input('summary');
        $article->text  = $request->input('composer');
        $article->cat  = $cat;
        $article->lang  = $request->input('lang');
        $article->thumbnail  = ''; // store empty for now
        $article->total_words  = $request->input('word_count');
        $article->total_chars  = $request->input('char_count');
        $article->total_paras  = $request->input('para_count');
        $article->status = "Pending";
        $article->approved_by_id = 0;
        $article->save();

        if(!$user->is_Admin){
            if(setting()->get('email_notifications') === 'all'){
                \Event::fire(new ArticleWasSubmitted($user,$article,$user->is_Admin)); // Fire Event
            }

        }


        Alert::success('Thanks for submit your article','Successfully')->autoclose(4000);
        return redirect('/article');
    }





    public function Update(Request $request){
        $this->validate($request, [
            'title' => 'required|max:70|min:15',
            'summary' => 'required|max:155|min:20',
            'cat' => 'required',
            'lang' => 'required',
            'composer' => 'required',
            'word_count' => 'required',
            'char_count' => 'required',
            'para_count' => 'required',
        ],[
            'title.required'=>'You cant leave Email field empty',
            'cat.required'=>'At lest select one Category',
        ]);

        $user = User::find(Auth::id());

        $cat =  implode(',', $request->input('cat')); // Reform Cat Data
        $article = Article::find($request->input('article_id'));
        $status = implode(',', $request->input('status')); 
        // Test status first and check if you are not admin then redirect back
        if($article->status === "Pending" && !$user->is_admin) {
            Alert::error('Your Article in Under Admin Review. Currently you are not able to update our Article.!','Failed')->autoclose(4000);
            return redirect('/article');
        }

        $article->user_id = $user->id;
        $article->title = $request->input('title');
        $article->summary  = $request->input('summary');
        $article->text  = $request->input('composer');
        $article->cat  = $cat;
        $article->lang  = $request->input('lang');
        $article->thumbnail  = ''; // store empty for now
        $article->total_words  = $request->input('word_count');
        $article->total_chars  = $request->input('char_count');
        $article->total_paras  = $request->input('para_count');
        $article->status = $status;
        $article->approved_by_id = 0;
        $article->save();


        Alert::success('Your Article has been updated.!','Successfully')->autoclose(4000);
        return redirect('/article');

    }


    public function ApprovedThisArticle(Request $request){
        try{
            $user = auth()->user();
            $article = Article::findOrFail($request->input('article_id'));
            $article->status = 'Approved';
            $article->approved_by_id = auth()->user()->id;
            $article->save();
            $if_notmy = $article->user_id;
            if(!User::find($if_notmy)->is_admin){
                if(setting()->get('email_notifications') === 'import-only' || setting()->get('email_notifications') === 'all') {
                    \Event::fire(new ArticleWasApproved($user, $article, $user->is_Admin)); // Fire Event
                }
            }
            Alert::success('Article #'.$request->input('article_id').' has been approved Successfully!')->autoclose(3500);
            return redirect()->back();
        }catch (Exception $e){
            Alert::error('Permission Denied')->autoclose(3500);
            return redirect()->back();
        }
    }


    public function UsedThisArticle(Request $request){
        try{
            $user = auth()->user();
            // Get price method
            $PriceMethod = $this->ReturnPrice($request->input('article_id'));

            $article = Article::findOrFail($request->input('article_id'));
            $article->status = 'Used';
            $article->sale_with = $PriceMethod['price'];
            $article->used_by = $user->id;
            $article->save();
            $if_notmy = $article->user_id;

            if(!User::find($if_notmy)->is_admin){
                if(setting()->get('email_notifications') === 'import-only' || setting()->get('email_notifications') === 'all') {
                    \Event::fire(new ArticleWasUsed($user, $article, $user->is_Admin)); // Fire Event
                }
            }
            Alert::success('Article #'.$request->input('article_id').' status has been changed.')->autoclose(3500);
            return redirect()->back();
        }catch (Exception $e){
            Alert::error('Permission Denied')->autoclose(3500);
            return redirect()->back();
        }
    }


    /*
     * Return Array
     */

    public function ReturnPrice($id){

        //grab Default value
        $settings = DB::table('app_settings')->get();
        $DefaultLowValue = $settings[0]->default_article_low_price;
        $DefaultNormalValue = $settings[0]->default_article_normal_price;

        // Grab Article Object
        $article = Article::find($id);

        // explode categories
        $cat_array = explode(',',$article->cat);

        // Collect High and Low Prices cat and store in array
        $LowPriceArray = array(); // grab Low all prices
        $NormalPriceArray = array(); // grab Normal all prices
        foreach($cat_array as $array){
            $cat = Category::where('name',$array)->get();
            if($cat->count() > 0){
                array_push($LowPriceArray,$cat[0]->low_price);
                array_push($NormalPriceArray,$cat[0]->normal_price);
            }else{
                array_push($LowPriceArray,$DefaultLowValue);
                array_push($NormalPriceArray,$DefaultNormalValue);
            }
        }

        // Find Max value but first let's find Words length

        $price = array();
        if(intval($article->total_words) > 300){
            $price['name'] = 'low price';
            $price['price'] = max($NormalPriceArray);
            return $price;
        }else{
            $price['name'] = 'normal price';
            $price['price'] = max($LowPriceArray);
            return $price;
        }

    }



}