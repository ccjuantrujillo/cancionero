<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LectureHasDetail extends Model
{
    protected $table = 'lecture_has_details';
    
    protected  $fillable = [
        'lecture_id',
        'tipo',
        'titulo',
        'descripcion',
    ];

    // Relations
    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeLecture::class, 'type_lecture_id', 'id');
    }

}
