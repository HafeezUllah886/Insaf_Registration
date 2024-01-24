<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;
   protected $fillable = [
    'proName',
    'phone',
    'mobile',
    'addr_line_one',
    'addr_line_two',
    'addr_line_three',
   ];
}
