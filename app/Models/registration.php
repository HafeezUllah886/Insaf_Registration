<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function track()
    {
        return $this->hasMany(tracking::class, 'appID', 'id');
    }
    public function assigned()
    {
        return $this->hasMany(User::class, 'id', 'assignedTo');
    }
}
