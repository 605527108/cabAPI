<?php namespace App;

trait SendableTrait {
    public function sendList()
    {
        return $this->belongstomany(static::class,'relations','sender_id','receiver_id')->withtimestamps();
    }
    
    public function beingSended()
    {
        return $this->belongstomany(static::class,'relations','receiver_id','sender_id')->withtimestamps();
    }

    public function isSendedBy(User $otherUser)
    {
        $otherUserId = $othreUser->sendList()->lists('receiver_id');
        return in_array($this->id,$otherUserId);
    }

}
