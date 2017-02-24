<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_articles = Article::where('status','Pending')->count();
        $approved_articles = Article::where('status','Approved')->count();
        $used_articles = Article::where('status','Used')->count();
        $articles = Article::all();
        return view('home',compact('approved_articles','pending_articles','used_articles'));
    }
}
