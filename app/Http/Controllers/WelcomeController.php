<?php namespace App\Http\Controllers;

use App\Repositories\LinkRepository as link;

class WelcomeController extends Controller {

	private $link;

	public function __construct(Link $link)
	{
		$this->link = $link;
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// // with repository usage
		//$link = $this->link->all();
		//$link = $this->link->paginate('id');
		
		//return view('welcome')->with('links',$link);

		$links = $this->link->paginate(10);

		return view('welcome',compact('links'));
	}

}
