<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewPaper extends Model
{
    //
    protected $fillable = [
        'paper_id',
        'review_scope',
        'journal_name',
        'doi',
    ];

    public function reviewScopeInfo()
    {
        return $this->review_scope . " - " . $this->journal_name;
    }
    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
