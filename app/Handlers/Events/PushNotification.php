<?php namespace App\Handlers\Events;

use App\Events\MessageWasSended;
use App\MessageRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class PushNotification {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  MessageWasSended  $event
	 * @return void
	 */
	public function handle(MessageWasSended $event)
	{
	    //Still to improve
		MessageRepository::save($event->userId,$event->messageToSend);
	}

}
