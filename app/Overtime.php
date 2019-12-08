<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
