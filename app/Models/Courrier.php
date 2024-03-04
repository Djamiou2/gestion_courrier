<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;

    public function nature()
    {
        return $this->belongsTo(NatureCourrier::class, "nature_id");
    }

    
    public function expediteur()
    {
        return $this->belongsTo(Expediteurs::class, 'expediteur_id');
    }

    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class, 'destinataire_id');
    }



      // un courrier est destiné à un ou plusieurs destinataires ou services
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    //public function imputation()
    //{
    //    return $this->belongsToMany(Imputation::class);
    //}
    
}
