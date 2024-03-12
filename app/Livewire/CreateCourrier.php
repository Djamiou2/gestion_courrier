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
use Livewire\WithFileUploads;

class CreateCourrier extends Component
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
    public $contenuDuFichier;

    public $currentStep=1;
    public $total_steps=3;

    // public $inputs;

    //  public function mount(){
    //    $this->fill([
    //         'inputs'=>collect(['nom'=>''])
   //      ]);
   //  }
 
public function store (Courrier $courrier )
    {
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

        $courrier = new Courrier();
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

        $courrier->fichier =$this->fichier;
        $courrier->save();
        // $courrier->fichier =$this->fichier->store('mes_fichiers', 'fichier');
        //$courrier->fichier =$this->fichier;
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

        return view('livewire.create-courrier' , 
        compact('listeExpediteur','listeNature',
        'listeDestinataire','listeService', 'listeDepartements' ));
    }

   //  public function remove($key){
         //dd($key);
   //       $this->inputs->pull($key);
  //   }

   //  public function add(){
   //      $this->inputs->push(['nom'=>'']);
   //  }

   //  public function save(){
  //       $validated=$this->validate(
   //          [
   //          'inputs.*.nom'=>'required',
   //          ],
   //          [
   //              'inputs.*.nom.required'=>'Le nom de la nature est obligatoire',
   //          ]
   //  );
     
   //   foreach($this->inputs as $input){
  //       NatureCourrier::create([
    //         'nom'=>$input['nom'],
           
    //     ]);
  //    }
       
   //   $this->js("alert('customers saved')");

  //   }

  
}
