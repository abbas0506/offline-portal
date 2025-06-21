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

    // Custom method for conference papers
    public function getConferenceDetails()
    {
        return $this->conference_name . " at " . $this->location;
    }
}
