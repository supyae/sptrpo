<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Link;

class Comment extends Model {

	//
	 public $table='comments';
		protected $primaryKey = "id";
		public $timestamps = true;

	protected $fillable = ['user_id','link_id','message'];


	// public function get_comment($id){

	// 	$comments = $this->leftJoin('users', function($join) {
	// 			      $join->on('users.id', '=', 'comments.user_id');
	// 			    })
	// 			    ->where('comments.link_id','=',$id)->get();
	// 	return $comments;
	// }

	// public function save_comment($data){		

	// 	$this->user_id = $data['user_id'];
	// 	$this->link_id = $data['link_id'];
	// 	$this->message = $data['message'];
	// 	$this->save();

	// }
	

}
