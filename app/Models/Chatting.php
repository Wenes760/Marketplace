<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatting extends Model
{
    use HasFactory;
    protected $table ='tb_chat';

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
