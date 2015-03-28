<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	//
	protected $table = 'messages';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'taxi_id', 'latitude','longitude'];

    public function user()
    {
        return $this->belongsto('User');
    }


}
