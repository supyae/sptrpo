<?php namespace App\Repositories;

Interface CommentRepositoryInterface{
	public function get_comment($id);
	public function getAll();
	public function find($id);
}