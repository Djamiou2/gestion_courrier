<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;

    //protected $fillable = [
      //  "objet",
       // "contenu",
     //   "fichier",
      //  "date_arrivee",
      //  "date_envoie",
      //  "delai_de_traitement",
      //  "importance",
      //  "date_signature",
       // "type",
      //  "nature_id",
      //  "service_id",
       // "expediteur_id",
       // "destinataire_id",
       // "user_id",
       // ];

        protected $guarded = [''];

    public function nature()
    {
        return $this->belongsTo(NatureCourrier::class, 'nature_id');
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
