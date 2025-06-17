<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';

    protected  $fillable = [
        'fecha',
        'tema',
    ];

    // Relations
    public function details()
    {
        return $this->hasMany(LectureHasDetail::class, 'lecture_id', 'id');
    }
}
