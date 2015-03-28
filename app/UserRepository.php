<?php namespace App;

class UserRepository{

    public function findByPhone($phone)
    {
        return User::where('phone','=',$phone)->firstOrFail();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function setReceiver($userIdToSend,User $user)
    {
        return $user->sendList()->attach($userIdToSend);
    }
    
    public function unsetReceiver($userIdToUnset,User $user)
    {
        return $user->sendList()->detach($userIdToUnset);
    }
}
