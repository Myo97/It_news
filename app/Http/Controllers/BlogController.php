<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::when(isset(request()->search),function($q){
            $key = request()->search;
            return $q->where("title","like","%$key%")->orWhere("description","like","%$key%");
        })->with("user","category")->latest('id')->paginate(5);
        return view("welcome",compact("articles"));
    }

    public function detail($id){
        $article = Article::find($id);
        return view('blog.detail',compact("article"));
    }

    public function baseOnCategory($id){
        $articles = Article::when(isset(request()->search),function($q){
            $key = request()->search;
            return $q->where("title","like","%$key%")->orWhere("description","like","%$key%");
        })->where("category_id",$id)->with("user","category")->latest('id')->paginate(5);
        return view("welcome",compact("articles"));
    }

    public function baseOnDate($date){  
        $addOneDay =  date('Y-m-d', strtotime($date. ' + 1 days'));

        $articles = Article::when(isset(request()->search),function($q){
            $key = request()->search;
            return $q->where('title','like','%$key%')->orWhere('description','like','%$key%');
        })->where('updated_at','>=',$date.' 00:00:00')->where('updated_at','<=',$addOneDay.' 00:00:00' )->with('user','category')->latest('id')->paginate(5);
        return view("welcome",compact("articles"));
        
    }

    public function baseOnUser($id){
        $articles = Article::when(isset(request()->search),function($q){
            $key = request()->search;
            return $q->where("title","like","%$key%")->orWhere("description","like","%$key%");
        })->where("user_id",$id)->with("user","category")->latest('id')->paginate(5);
        return view("welcome",compact("articles"));
    }
}
