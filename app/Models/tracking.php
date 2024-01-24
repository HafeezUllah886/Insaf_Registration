<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function application()
    {
        return $this->belongsTo(registration::class, 'appID', 'id');
    }

    public function from_user()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }
    public function to_user()
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }
}
