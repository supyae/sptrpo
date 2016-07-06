<?php namespace App\Http\Controllers;

use App\Repositories\LinkRepository as link;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class LinkController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    private $link;
	public function __construct(Link $link)
	{
		//$this->middleware('guest');
        $this->link = $link;
		$this->middleware('auth');

	}

	public function get_link(){
        return view('link');
    }
    
     public function save_link(Request $request){
        //return "posting a link";
     	$user = $request->user();
        $data = array(
        	'user_id'=> $user->id,
        	'title' => $request->title,
        	'url' => $request->url
        	);
        // // call repository
        $this->link->create($data);
        return redirect('/');         
      
    }

	

}
