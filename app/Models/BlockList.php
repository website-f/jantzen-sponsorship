<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockList extends Model
{
    use HasFactory;

    protected $table = 'blocklist';

    protected $fillable = [
        'email',
        'company_name',
        'contact_number',
        'name'
    ];
}
