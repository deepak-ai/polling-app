<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['poll_id', 'constituency_id','poll_option_id', 'votes'];

    public function poll(){
        return $this->belongsTo(Poll::class);
    }

    public function constituency(){
        return $this->hasOne(Constituency::class);
    }
}
