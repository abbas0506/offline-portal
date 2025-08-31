<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferencePaper extends Model
{
    //
    protected $fillable = [
        'conference_name',
        'location',
        'conference_date',
        'doi',
    ];
    protected $casts = [
        'conference_date' => 'date',
    ];
    // Custom method for conference papers
    public function getConferenceDetails()
    {
        return $this->conference_name . " at " . $this->location;
    }
    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
