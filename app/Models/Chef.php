<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chef extends Model
{
    use HasFactory;




    protected $fillable = [
        'address',
        'CV',
        'photograph',
        'telephone',
        'description_of_dishes',
        'visibility',

    ];

    // Relazione many to many con il model Sponsor
    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    // Relazione many to many con il model Specialization
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    // Relazione many to many con il model Vote
    public function votes()
    {
        return $this->belongsToMany(Vote::class);
    }
}
