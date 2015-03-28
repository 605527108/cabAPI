<?php namespace App;

class MessageRepository{

    public function save($userId,$messageToSend)
    {
        return User::findOrFail($userId)->messages()->save($messageToSend);    
    }
    

    public function getAllMessagesForUser(User $user)
    {
        $userIds = $user->beingSended()->lists('sender_id');

        return Message::whereIn('user_id',$userIds)->latest()->get();
    }

}
