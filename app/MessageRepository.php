<?php namespace App;

class MessageRepository{

    public function save($user,$messageToSend)
    {
        return $user->messages()->save(Message::create($messageToSend));    
    }
    

    public function getAllMessagesForUser(User $user)
    {
        $userIds = $user->beingSended()->lists('sender_id');
        //return Message::whereIn('user_id',$userIds)->latest()->get();
        return Message::whereIn('user_id',$userIds)->latest()->take(1)->get();
    }

}
