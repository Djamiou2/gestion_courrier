<?php

namespace App\Livewire;

use App\Models\Courrier;
use App\Models\Destinataire;
use App\Models\Expediteurs;
use App\Models\NatureCourrier;
use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCourrier extends Component
{

    use WithFileUploads;
    public $objet;
    public $contenu;
    public $date_arrivee;
    public $date_envoi;
    public $delai_de_traitement;
    public $importance;
    public $expediteur_id;
    public $destinataire_id;
    public $service_id;
    public $user_id;
    public $nature_id;
    public $pieces_jointes;
    public $type;
    public $courrier;

public function store (Courrier $courrier )
    {
    $this->validate([
    'objet' => 'required|string',
    'contenu' => 'required|string',
    'pieces_jointes' => 'mimes:pdf,xlsx,csv|max:2048', // Ajout des types de fichiers autorisés et la taille maximale en kilo-octets (2 Mo).
    'date_arrivee' => 'date|nullable|before_or_equal:today',
    'date_envoi' => 'date|nullable', // Ajout de la validation pour les dates qui peuvent être nulles.
    'delai_de_traitement' => 'string',
    'importance' => 'nullable',
    'type' => 'required',
    'nature_id' => 'required',
    'service_id' => 'nullable', // Validation ajoutée pour les cas où le champ peut être nul.
    'user_id' => 'required',
    'expediteur_id' => 'required',
    'destinataire_id' => 'nullable',
    ], [
    'objet.required' => "L'objet est obligatoire.",
    'contenu.required' => "Le contenu est obligatoire.",
    'pieces_jointes.mimes' => 'Les pièces jointes doivent être au format PDF, XLSX ou CSV.',
    'pieces_jointes.max' => 'La taille des pièces jointes ne doit pas dépasser 2 Mo.',
    'date_arrivee.date' => 'La date d\'arrivée doit être une date valide.',
    'date_arrivee.before_or_equal' => 'La date d\'arrivée doit être antérieure ou égale à la date actuelle.',
    'date_envoi.date' => 'La date d\'envoi doit être une date valide.',
    'delai_de_traitement.string' => 'Le délai de traitement doit être une chaîne de caractères.',
    'importance.nullable' => 'L\'importance peut être une valeur nulle ou valide.',
    'type.required' => 'Le type de courrier est obligatoire.',
    'nature_id.required' => 'La nature est obligatoire.',
    'service_id.nullable' => 'Le service doit être une valeur nulle ou valide.',
    'user_id.required' => 'L\'utilisateur est obligatoire.',
    'expediteur_id.required' => 'L\'expéditeur est obligatoire.',
    'destinataire_id.nullable' => 'Le destinateur doit être une valeur nulle ou valide.',
    ]);

    try {
        $courrier =new Courrier();
        $courrier->objet = $this->objet;
        $courrier->contenu = $this->contenu;
        $courrier->date_arrivee = $this->date_arrivee;
        $courrier->date_envoi = $this->date_envoi;
        $courrier->delai_de_traitement = $this->delai_de_traitement;
        $courrier->importance = $this->importance;
        $courrier->type = $this->type;
        $courrier->nature_id = $this->nature_id;
        $courrier->expediteur_id = $this->expediteur_id;
        $courrier->destinataire_id = $this->destinataire_id;
        $courrier->service_id = $this->service_id;
        $courrier->user_id = Auth::user()->id;
        $courrier->save();
       // toastr()->success('Le courrier a été enregistré avec succès!', 'Félicitations',
          //   ['positionClass' => 'toast-bottom-right']);
            return redirect()->Route('courriers');
    }
 catch (Exception $e) {

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

        return view('livewire.create-courrier' , 
        compact('listeExpediteur','listeNature',
        'listeDestinataire','listeService'));
    }
}
