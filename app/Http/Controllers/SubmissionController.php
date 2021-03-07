<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article_detail;
use App\Article;
use App\Copyright;
use App\ArticleSubmission;
use Carbon\Carbon;
use Auth;

class SubmissionController extends Controller
{
    //
    public function index(){
    	if (session('article_id')) {
    		$article_id = session()->get('article_id');
    		$articles = Article_detail::where('article_id', $article_id)
										->get();
			$copyrights = Copyright::where('article_id', $article_id)
									->first();

	    	return view('author.step5',compact('articles','copyrights'));
		}else{
			return redirect('/author');
		}
    }

    public function submit_article(Request $request){
    	$count = Article::count();
    	$date = Carbon::now();
	    $date_substring = date('Y').date('m').date('d');
	    $id = 'REF-'.$date_substring.'R000'.$count;
	    $article_id = $request->session()->get('article_id');

	    $article = Article::where('id',$article_id)->first();

	    ArticleSubmission::insert([
	    	'ref_id' => $id,
	    	'user_id' => Auth::user()->id,
	    	'article_id' => $article_id
	    ]);

	    $submission = ArticleSubmission::where('id',$article_id)->first();

	    return json_encode(['msg' => 1, 'ref_id' => $submission->ref_id, 'title' => $article->title]);
    }
}
