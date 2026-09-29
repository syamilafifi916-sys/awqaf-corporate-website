<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgmRsvp extends Model
{
    protected $fillable = ['name', 'ic_number', 'attendance'];

    protected $hidden = ['ic_number'];

    protected function casts(): array
    {
        return [
            'ic_number' => 'encrypted',
        ];
    }
}
