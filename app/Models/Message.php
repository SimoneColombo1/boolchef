<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chef_id',
        'text_mes',
        'email_customer'
    ];
    // Relazione one to many con Chef. Message è la tabella secondaria.
    public function chef(){
        return $this->belongsTo(Chef::class);
    }
}
