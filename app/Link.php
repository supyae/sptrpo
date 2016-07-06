<?php namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;

class Link extends Model {

	//
	 public $table='links';
		protected $primaryKey = "id";
		public $timestamps = true;

	protected $fillable = ['user_id', 'title', 'url'];

}

?>
