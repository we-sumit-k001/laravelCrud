<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable=['name','is_active','slug'];

    public function event()
    {
        return $this->hasOne(Event::class);
    }

    public function note()
    {
        return $this->morphOne(Note::class,'note');
    }
}
