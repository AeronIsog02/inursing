<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article_detail;
use App\Article;
use App\ArticleSubmission;
use Auth;

class AuthorDashboardController extends Controller
{
    //
    public function index(){
    	$user_id = Auth::user()->id;
    	$articles = Article::where('user_id', $user_id)->paginate(5, ['*'], 'articles');
    	$submissions = ArticleSubmission::where('user_id', $user_id)->paginate(5, ['*'], 'submissions');

    	foreach ($submissions as $key => $value) {
    		$res = Article::where('id', $value->article_id)->first();

    		$items[] = [
    			'ref_id' => $value->ref_id,
    			'title' => $res->title,
    			'status' => $value->status
    		];
    	}

    	return view('author.dashboard',compact('articles','submissions','items'));
    }
}
