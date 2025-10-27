<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;    
    protected $table = 'event';
    protected $fillable = ['title', 'body', 'happen_date', 'location', 'user_id'];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
