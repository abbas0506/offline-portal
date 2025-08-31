<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyReport extends Model
{
    //
    protected $fillable = [
        'paper_id',
        'survey_scope',
        'key_findings',
        'doi',
    ];

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
