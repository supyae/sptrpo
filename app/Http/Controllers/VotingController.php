<?php namespace App\Http\Controllers;

use App\Repositories\LinkRepository as link;
use App\Repositories\VoteRepository as vote;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use App\Link;

class VotingController extends Controller {

	// public function voting(){
	// 	return view('auth/register');
	// }

  private $link;
  private $vote;
  public function __construct(Link $link,Vote $vote)
  {
       $this->link = $link;
       $this->vote = $vote;
  }

  public function voting($datastring,Request $request){
         $data=explode(',',$datastring);
         $postid = $data[0];
         $action = $data[1];

         // ////update votecount in link table;
         $cn = $this->link->find($postid);
         $count = $cn->vote;
          if ($action == 'up'){
              $count++;
          }
        elseif ($action == 'down'){
           if($count > 0){
             $count--;
           }
          }
        $data = array('vote'    =>  $count);
        $this->link->update($data,$postid);
       
        // ////saving votes table;
       $user = $request->user();
        $user_id = $user->id; 
       
       
        if($action == 'up'){
           $updata = 1; 
           $downdata = 0;
        }
        elseif($action == 'down'){
          $downdata = 1;
          $updata = 0;
        }       
        $vdata = array('user_id' => $user_id, 'link_id' => $postid, 'up' => $updata, 'down' => $downdata);
       
        $this->vote->create($vdata);
        
  }

}
