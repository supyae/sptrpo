<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Link;

class VoteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($postid)
	{
		//
        return $postid;
	}

    public function voteup($postid)
    {
        //
        $cn = Link::where('id','=',$postid)->get();
        foreach ($cn as $val) {
            $count = $val->vote;
        }
        $count++;
        Link::where('id', $postid)->update(array(
            'vote'    =>  $count));


        return $postid;
    }
    public function votedown($postid){
         $cn = Link::where('id','=',$postid)->get();
        foreach ($cn as $val) {
            $count = $val->vote;
        }
        $count--;
        Link::where('id', $postid)->update(array(
            'vote'    =>  $count));


        return $postid;

    }

	

}
