<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalPaper extends Model
{
    //
    protected $fillable = [
        'paper_id',
        'journal_name',
        'volume',
        'issue',
        'doi',
        'issn',
    ];

    public function journalInfo()
    {
        return $this->journal_name . " - Volume " . $this->volume . ", Issue " . $this->issue;
    }
}
