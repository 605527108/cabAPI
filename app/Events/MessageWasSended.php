<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class MessageWasSended extends Event {

	use SerializesModels;
	
	protected $userId;
	protected $messageToSend;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($userId,$messageToSend)
	{
		//
		$this->user = $user;
		$this->messageToSend = $messageToSend;
	}

}
