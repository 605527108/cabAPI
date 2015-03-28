<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class SetReceiver extends Command implements SelfHandling {

    private $userId;
    private $userPhonetoSend;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($userId,$userPhoneToSend)
	{
		//
        $this->userId = $userId;
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
        $user = $userRepo->findById($this->userId);
        $userIdToSend = $userRepo->findByPhone($this->userPhoneToSend)->id;
        $userRepo->setReceiver($userIdToSend,$user);
	}

}
