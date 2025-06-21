<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicalReport extends Model
{
    //
    protected $fillable = [
        'paper_id',
        'institution',
        'report_number',
        'doi',
    ];

    public function reportDetails()
    {
        return $this->institution . " - Report # " . $this->report_number;
    }
}
