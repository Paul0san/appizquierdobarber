<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtotal','discount','total','user_id','service_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }
    
}
