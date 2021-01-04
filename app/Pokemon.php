<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    // 1 pokemon PERTENECE A un trainer (belongsTo)
    public function trainer()
    {
        return $this->belongsTo('LaraDex\Trainer');
    }
}
