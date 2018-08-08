<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'topic', 'opt1', 'opt2', 'opt3', 'opt4', 'ans', 'exam_id',
    ];

    public function exam()
    {
        return $this->belongsTo('App\Exam');
    }

}
