<?php

namespace App\Models;

use App\Models\Sponsorship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }
}
