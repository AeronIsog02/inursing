<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article_detail;
use App\Article;
use Auth;

class ArticleController extends Controller
{
    //
	public function index(){
		if (session('article_id')) {
			$id = Auth::user()->id;
			$article_id = session()->get('article_id');

			$articles = Article_detail::where('article_id', $article_id)
										->get();

			return view('author.step3', compact('articles'));
		}else{
			return redirect('/author');
		}

	}

    public function saveArticle(Request $request){

    	if ($request->hasFile('article_file')) {

	        $file = $request->file('article_file');
	        $file_name = $file->getClientOriginalName();
	        $file_ext = $file->getClientOriginalExtension();
	        $file_size = $file->getSize();
	        $fileInfo = pathinfo($file_name);
	        $filename = $fileInfo['filename'];
	        $newname = $filename.".".$file_ext;
	        $path = $file->move('storage/docs/', $newname);

	        $result = Article_detail::insertGetId([
	        	'article_id' => $request->session()->get('article_id'),
	        	'title' => $request->get('article_title'),
	        	'file_name' => $filename,
	        	'item_page' => $request->get('article_item_page'),
	        	'file_size' => $file_size,
	        	'article_desc' => $request->get('article_desc'),
	          	'file' => '/'.$path,
	        ]);

	        $items[] = [
	        	'id' => $result,
	        	'file_name' => $filename,
	        	'item_page' => $request->get('article_item_page'),
	        	'file_size' => $file_size,
	        	'article_desc' => $request->get('article_desc'),
	        ];

	        return json_encode(['msg' => 1, 'items' => $items]);

	    }else{
	    	return json_encode(['msg' => 0]);
	    }
    }

    public function update_article(Request $request){
    	$article_id = $request->session()->get('article_id');
    	
    	Article::where('id', $article_id)->update([
			"title" => $request->get('article_title')
		]);

		return json_encode(1);
    }

    public function create_article(Request $request){

    	$res = Article::insertGetId([
    		'user_id' => Auth::user()->id,
    		'type' => $request->get('article_type'),
     	]);

     	$request->session()->put('article_id', $res);

     	return json_encode(['msg' => 1, 'id' => $res]);
    }

    public function delete_all(Request $request)
    {
        $ids = $request->ids;

        Article_detail::whereIn('id',explode(",",$ids))->delete();

        return response()->json(1);
    }

    public function update_article_details(Request $request)
    {
        if ($request->hasFile('e_article_file')) {

	        $file = $request->file('e_article_file');
	        $file_name = $file->getClientOriginalName();
	        $file_ext = $file->getClientOriginalExtension();
	        $file_size = $file->getSize();
	        $fileInfo = pathinfo($file_name);
	        $filename = $fileInfo['filename'];
	        $newname = $filename.".".$file_ext;
	        $path = $file->move('storage/docs/', $newname);

	        $result = Article_detail::where('id', $request->get('e_article_id'))->update([
	        	'article_id' => $request->session()->get('article_id'),
	        	'title' => $request->get('e_article_title'),
	        	'file_name' => $filename,
	        	'item_page' => $request->get('e_article_item_page'),
	        	'file_size' => $file_size,
	        	'article_desc' => $request->get('e_article_desc'),
	          	'file' => '/'.$path,
	        ]);

	        return json_encode(['msg' => 1]);

	    }else{
	    	return json_encode(['msg' => 0]);
	    }
    }
}
