<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Link;
use App\Vote;

class VoteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function __construct(){
       
    }

	public function index($postid)
	{
		//
        return $postid;
	}

    public function voting($datastring,Request $request)
    {
        $data=explode(',',$datastring);
        $postid = $data[0];
        $action = $data[1];

        //
        $user=$request->user();
        $user_id = $user->id;

        // // save voting
       $vdata = array(
            'user_id' => $user_id,
            'link_id' => $postid,
            'action' => $action
            );
         
        $obj = new Vote;
        //check 
        $obj->check_vote($vdata);
      
            $obj->save_vote($vdata);
            
            // update vote count at link table;
            $obj2 = new Link;
            $obj2->update_votecount($action,$postid);
      
       // return $action;
       
    }
     
	

}
