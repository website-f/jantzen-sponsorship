<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsorship extends Model
{
    use HasFactory, SoftDeletes;

    public function tagging()
    {
        return $this->belongsToMany(Tag::class);
    }
}
