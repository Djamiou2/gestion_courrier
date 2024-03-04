<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    use HasFactory;
    public function departement() {
        return $this->belongsTo(Departement::class);
    } 

     public function user() {
        return $this->hasMany(User::class);
    } 

    public function courrier() {
        return $this->belongsTo(Courrier::class);
    } 
    
}
