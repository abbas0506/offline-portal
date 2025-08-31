<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $table = 'thesis';

    protected $fillable = [
        'paper_id',
        'degree_type',
        'degree_program',
        'key_findings',
        'methodology',
        'submission_date',
        'supervisor',
        'doi',
    ];
    protected $casts = [
        'submission_date' => 'date',
    ];
    // Relations
    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
