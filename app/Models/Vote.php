<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote',
        'label',
    ];

    public function chefs()
    {
        return $this->belongsToMany(Chef::class);
    }
}
