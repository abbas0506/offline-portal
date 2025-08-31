<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    //
    protected $fillable = [
        'title',
        'abstract',
        'authors',
        'publication_date',
        'keywords',
        'type',
    ];

    protected $casts = [
        'publication_date' => 'date',
    ];

    // Scope for fetching papers by type
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
    public function journalPapers()
    {
        return $this->hasMany(JournalPaper::class);
    }
    public function conferencePapers()
    {
        return $this->hasMany(ConferencePaper::class);
    }
    public function technicalReports()
    {
        return $this->hasMany(TechnicalReport::class);
    }
    public function reviewPapers()
    {
        return $this->hasMany(ReviewPaper::class);
    }
    public function surveyReports()
    {
        return $this->hasMany(SurveyReport::class);
    }
    public function thesis()
    {
        return $this->hasMany(Thesis::class);
    }
}
