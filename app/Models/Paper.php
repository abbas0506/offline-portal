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
    // Cast 'authors' to array if stored as JSON
    // protected $casts = [
    //     'authors' => 'array',
    // ];

    // Scope for fetching papers by type
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
}
