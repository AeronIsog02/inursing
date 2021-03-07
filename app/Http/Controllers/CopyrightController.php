<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Copyright;

class CopyrightController extends Controller
{
    //
	public function save_copyright(Request $request){
		$article_id = $request->session()->get('article_id');
		$isExist = Copyright::where('article_id', $article_id)->first();

		if ($isExist) {

			$res = Copyright::where('article_id', $article_id)->update([
				'article_id' => $article_id,
				'question1' => $request->get('q1'),
				'question2' => $request->get('q2'),
				'question3' => $request->get('q3'),
				'question3_1' => $request->get('q3_1'),
				'question4' => $request->get('q4'),
				'question4_1' => $request->get('q4_1'),
				'question5' => $request->get('q5'),
			]);

		}else{
			$res = Copyright::insert([
				'article_id' => $article_id,
				'question1' => $request->get('q1'),
				'question2' => $request->get('q2'),
				'question3' => $request->get('q3'),
				'question3_1' => $request->get('q3_1'),
				'question4' => $request->get('q4'),
				'question4_1' => $request->get('q4_1'),
				'question5' => $request->get('q5'),
			]);
		}		

		return json_encode(1);
	}

}
