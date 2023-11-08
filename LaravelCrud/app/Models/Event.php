<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'organization_id',
        'slug',
        'description',
        'event_type',
        'topics',
        'has_proposed_date',
        'from_date',
        'to_date',
        'is_accepted_speaker_application',
        'is_active',
    ];

    protected $attributes = [
        'has_proposed_date' => false,
        'is_accepted_speaker_application' => false,
        'is_active'=> false,
    ];



    public function organization()
    {
        return $this->belongsTo(Organization::class);

    }

    public function note()
    {
        return $this->morphOne(Note::class, 'note', 'note_type', 'note_id');
    }

}
