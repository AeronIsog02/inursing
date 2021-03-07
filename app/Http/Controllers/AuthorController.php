<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\CoAuthor;
use Auth;

class AuthorController extends Controller
{
    //

	public function save_author(Request $request){
		if(!$request->get('ca_item')){

			if ($request->hasFile('a_cv')) {

		        $file = $request->file('a_cv');
		        $file_name = $file->getClientOriginalName();
		        $file_ext = $file->getClientOriginalExtension();
		        $file_size = $file->getSize();
		        $fileInfo = pathinfo($file_name);
		        $filename = $fileInfo['filename'];
		        $newname = $filename.".".$file_ext;
		        $path = $file->move('storage/docs/', $newname);

		        $res = Author::insert([
					'article_id' => $request->get('article_id'),
					'fname' => $request->get('a_fname'),
					'lname' => $request->get('a_lname'),
					'email' => $request->get('a_email'),
					'pnumber' => $request->get('a_pnumber'),
					'address' => $request->get('a_address'),
					'country' => $request->get('a_country'),
					'academic_qualification' => $request->get('a_haq'),
					'bachelor_degree' => $request->get('a_bd'),
					'cv' => '/'.$path,
				]);

		        return json_encode(['msg' => 1]);

		    }else{
		    	return json_encode(['msg' => 0]);
		    }

		}else{

			if ($request->hasFile('a_cv')) {

		        $file = $request->file('a_cv');
		        $file_name = $file->getClientOriginalName();
		        $file_ext = $file->getClientOriginalExtension();
		        $file_size = $file->getSize();
		        $fileInfo = pathinfo($file_name);
		        $filename = $fileInfo['filename'];
		        $newname = $filename.".".$file_ext;
		        $path = $file->move('storage/docs/', $newname);

		        $author = Author::insertGetId([
					'article_id' => $request->get('article_id'),
					'fname' => $request->get('a_fname'),
					'lname' => $request->get('a_lname'),
					'email' => $request->get('a_email'),
					'pnumber' => $request->get('a_pnumber'),
					'address' => $request->get('a_address'),
					'country' => $request->get('a_country'),
					'academic_qualification' => $request->get('a_haq'),
					'bachelor_degree' => $request->get('a_bd'),
					'cv' => '/'.$path,
				]);

				if ($request->hasFile('ca_cv')) {

					foreach($request->input('ca_item') as $key => $value) {

						$file = $request->file('ca_cv')[$key];
				        $file_name = $file->getClientOriginalName();
				        $file_ext = $file->getClientOriginalExtension();
				        $file_size = $file->getSize();
				        $fileInfo = pathinfo($file_name);
				        $filename = $fileInfo['filename'];
				        $newname = $filename.".".$file_ext;
				        $path = $file->move('storage/docs/', $newname);

				        $res = CoAuthor::insert([
							'fname' => $request->get('ca_fname')[$key],
							'ca_id' => $author,
							'lname' => $request->get('ca_lname')[$key],
							'email' => $request->get('ca_email')[$key],
							'pnumber' => $request->get('ca_pnumber')[$key],
							'address' => $request->get('ca_address')[$key],
							'country' => $request->get('ca_country')[$key],
							'academic_qualification' => $request->get('ca_haq')[$key],
							'bachelor_degree' => $request->get('ca_bd')[$key],
							'cv' => '/'.$path,
						]);

				    }
		        

				}
				return json_encode(['msg' => 1]);
		    }else{
		    	return json_encode(['msg' => 0]);
		    }
		}
		
	}
}
