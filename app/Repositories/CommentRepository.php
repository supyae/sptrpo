<?php namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class CommentRepository extends Repository {

	 public function model() {
        return 'App\Comment';
    }



    public function get_comment($id){
        $comments = $this->model->select('comments.user_id','comments.link_id','comments.message','users.id','users.name')
            ->leftJoin('users','users.id','=','comments.user_id')
            ->where('comments.link_id','=',$id)->get();

        return $comments;
    }
}

?>