<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;

    public function imputation() {
        return $this->belongsToMany( Imputation::class, "instruction_id");
    }

}
