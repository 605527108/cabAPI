<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class MessageWasSended extends Event {

	use SerializesModels;
	
	public $user;
	public $messageToSend;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($user,$messageToSend)
	{
		//
		$this->user = $user;
		$this->messageToSend = $messageToSend;
	}

}
