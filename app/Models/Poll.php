<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];

    public function pollOption()
    {
        return $this->hasMany(PollOption::class);
    }

    public function pollAnswer()
    {
        return $this->hasMany(PollAnswer::class);
    }


}
