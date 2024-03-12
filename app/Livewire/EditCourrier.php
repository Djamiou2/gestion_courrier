<?php

namespace App\Livewire;

use App\Models\Courrier;
use App\Models\Departement;
use App\Models\Destinataire;
use App\Models\Expediteurs;
use App\Models\NatureCourrier;
use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditCourrier extends Component
{
    use WithFileUploads;
    public $objet;
    public $contenu;
    public $date_signature;
    public $date_arrivee;
    public $date_envoie;
    public $delai_de_traitement;
    public $importance;
    public $expediteur_id;
    public $destinataire_id;
    public $service_id;
    public $user_id;
    public $nature_id;
    public $fichier;
    public $type;
    public $courrier;
    public $courriers;
    public $contenuDuFichier;

    public function mount() {
        $this->objet = $this->courriers->objet;
        $this->date_signature = $this->courriers->date_signature;
        $this->date_arrivee = $this->courriers->date_arrivee;
        $this->date_envoie = $this->courriers->date_envoie;
        $this->delai_de_traitement = $this->courriers->delai_de_traitement;
        $this->importance = $this->courriers->importance;
        $this->type = $this->courriers->type;
        $this->expediteur_id = $this->courriers->expediteur_id;
        $this->destinataire_id = $this->courriers->destinataire_id;
        $this->service_id = $this->courriers->service_id;
        $this->user_id = $this->courriers->user_id;
        $this->nature_id = $this->courriers->nature_id;
        $this->fichier = $this->courriers->fichier;
    
    }



    public function update (Courrier $courrier )
    {
        $courrier = Courrier::find($this->courriers->id);
    $this->validate([
     'objet' => 'required|string',
     'contenu' => 'required|string',
     'fichier' => 'mimes:jpg,jpeg,png,pdf|max:2048', 
     'date_arrivee' => 'date|required|before_or_equal:today',
     'date_signature' => 'date', 
     'date_envoie' => 'nullable', 
     'delai_de_traitement' => 'string|required',
    'importance' => 'nullable',
     'type' => 'required',
     'nature_id' => '',
     'service_id' => '',
     'user_id' => '',
     'expediteur_id' => '',
     'destinataire_id' => '',
    ], [
    'objet.required' => "L'objet est obligatoire.",
    'contenu.required' => "Le contenu est obligatoire.",
    'fichier.mimes' => 'Les pièces jointes doivent être au format PDF, XLSX ou CSV.',
    'fichier.max' => 'La taille des pièces jointes ne doit pas dépasser 2 Mo.',
    'date_arrivee.date' => 'La date d\'arrivée doit être une date valide.',
    'date_arrivee.required' => 'La date d\'arrivée est obligatoire.',
    'date_arrivee.before_or_equal' => 'La date d\'arrivée doit être antérieure ou égale à la date actuelle.',
    'date_signature.date' => 'La date d\'envoi doit être une date valide.',
    'delai_de_traitement.required' => 'Le délai de traitement est obligatoire',
    'importance.nullable' => 'L\'importance peut être une valeur nulle ou valide.',
    'type.required' => 'Le type de courrier est obligatoire.',
    'date_signature.required'=> 'la date de signature est obligatoire',
    'nature_id.required' => 'La nature est obligatoire.',
    'service_id.nullable' => 'Le service doit être une valeur nulle ou valide.',
    'user_id.required' => 'L\'utilisateur est obligatoire.',
    'expediteur_id.required' => 'L\'expéditeur est obligatoire.',
    'destinataire_id.nullable' => 'Le destinateur doit être une valeur nulle ou valide.',
    ]);
    

    try {

        $courrier->objet = $this->objet;
        $courrier->contenu = $this->contenu;
        $courrier->date_arrivee = $this->date_arrivee;
        $courrier->date_envoie = $this->date_envoie;
        $courrier->date_signature = $this->date_signature;
        $courrier->delai_de_traitement = $this->delai_de_traitement;
        $courrier->importance = $this->importance;
        $courrier->type = $this->type;
        $courrier->nature_id = $this->nature_id;
        $courrier->expediteur_id = $this->expediteur_id;
        $courrier->destinataire_id = $this->destinataire_id;
        $courrier->service_id = $this->service_id;
        $courrier->user_id = Auth::user()->id;

        //$courrier->fichier =$this->fichier->store('mes_fichiers', 'fichier');
        $courrier->fichier =$this->fichier;
       

        $courrier->save();
        return redirect()->Route('courriers')->with('success','Le courrier a été enregistré avec succès !!');
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', 'Erreur d\'enregistrement');
        }
}


    public function render()
    {

        $listeExpediteur = Expediteurs::all();
        // La liste des natures courrier
        $listeNature = NatureCourrier::all();

        $listeDestinataire = Destinataire::All();  
        
        // La liste des services
        $listeService = Service::all(); 

        $listeDepartements = Departement::all();

        return view('livewire.edit-courrier' , 
        compact('listeExpediteur','listeNature',
        'listeDestinataire','listeService', 'listeDepartements' ));
    }
}
