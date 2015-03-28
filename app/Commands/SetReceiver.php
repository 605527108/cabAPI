<?php namespace App\Commands;

use App\Commands\Command;
use App\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class SetReceiver extends Command implements SelfHandling {

    private $user;
    private $userPhonetoSend;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($user,$userPhoneToSend)
	{
		//
        $this->user = $user;
        $this->userPhoneToSend = $userPhoneToSend;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		//
        $userRepo = new UserRepository;
        $userIdToSend = $userRepo->findByPhone($this->userPhoneToSend)->id;
        $userRepo->setReceiver($userIdToSend,$this->user);
	}

}
