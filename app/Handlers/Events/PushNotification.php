<?php namespace App\Handlers\Events;

use App\Events\MessageWasSended;
use App\MessageRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class PushNotification {
    protected $messageRepository;
	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(MessageRepository $messageRepository)
	{
		$this->messageRepository = $messageRepository;
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
		$result = $this->messageRepository->save($event->user,$event->messageToSend);
		if(!$result)
		{
		    dd('Can not insert into database');
		}
	}

}
