<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {

	//
	 public $table='votes';
		protected $primaryKey = "id";
		public $timestamps = true;

	protected $fillable = ['user_id', 'link_id', 'up', 'down'];

}
