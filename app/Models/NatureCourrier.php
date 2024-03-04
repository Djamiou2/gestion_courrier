<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureCourrier extends Model
{
    use HasFactory;

    public function courrier()
    {
        return $this->belongsTo(NatureCourrier::class);
    }
}
