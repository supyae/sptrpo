<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Vote;
class AjaxTest extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

	}

	public function test(){

		  // if(Request::ajax()) {
	   //    $data = Input::all();
	   //    print_r($data);die;
		$vote = new Vote;
        	$vote->user_id = 9;
        	$vote->save();
		
    
	}


}
