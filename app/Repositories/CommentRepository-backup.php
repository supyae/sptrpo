<?php namespace App\Repositories;

use App\Comment;
use App\User;
class CommentRepository_backup{

	 public function model() {
        return 'App\Comment';
    }

	protected $user;
	protected $comment;

	public function __construct(User $user,Comment $comment){
		$this->model = $comment;
		$this->user = $user;


	}

	public function get_comment($id){
	$comments = $this->model->select('comments.user_id','comments.link_id','comments.message','users.id','users.name')
							->leftJoin('users','users.id','=','comments.user_id')
							->where('comments.link_id','=',$id)->get();
							
		return $comments;
	}

	public function getAll(){
		//return Comment::all();
	

	}
	public function find($id){
		return Comment::findOrFail($id);
	}


   
}

?>