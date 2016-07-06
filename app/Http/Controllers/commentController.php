<?php namespace App\Http\Controllers;

use App\Repositories\CommentRepository as comment;// for increment count in link table;
use App\Repositories\LinkRepository as link;

use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class commentController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
   private $comment;
  public function __construct(Comment $comment,Link $link)
  {
        $this->comment = $comment;
        $this->link = $link;
   // $this->middleware('auth');

  }


  public function get_comment($id){


    $comments = $this->comment->get_comment($id);
    //return $this->comment->all();


    $linkid = $id;

       if(Auth::check()){ //to check login or not              
            //$comments = Comment::find($id);  

            if($comments == null){
                 $comments = '';
            }
            return view('comment_user')->with('comments',$comments)->with('linkid',$linkid);

            //return response()->json(['id' => $id]);//if pass json array;
       }
       else{

           if($comments == null) {
               $comments = '';
           }
            return view('comment_guest')->with('comments',$comments)->with('linkid',$linkid);

       }
  }


  // comment save section;
  
     public function save_comment(Request $request){          
       // save comment section;
       $user=$request->user();
       $data = array(
            'user_id' => $user->id,
            'link_id' => $request->linkid,
            'message' => $request->message
            );
      $this->comment->create($data);

       // increment comment count in links table;
       $linkid = $request->linkid;
       
      $cn = $this->link->find($linkid);
      $count = $cn->comment;
      $count++;
      $cdata = array('comment'    =>  $count);
        $this->link->update($cdata,$linkid);


       return redirect('/');  

     }

     public function get_guestComment($id){
            //$comments = Comment::where('link_id','=',$id)->get();  

            $comments = $this->comment->get_comment($id);
            if($comments== null){
                 $comments = '';
            }            
            return view('comment_user')->with('comments',$comments)->with('linkid',$id);
               


     }

  

  

}
