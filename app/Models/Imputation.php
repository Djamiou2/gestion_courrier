<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imputation extends Model
{
    use HasFactory;

     public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'courrier_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserImpute_id');
    }

    public function instruction()
    {
        return $this->belongsTo(Instruction::class);
    }

    public function traitement()
    {
    return $this->belongsToMany(Traitement::class);
    }

}
