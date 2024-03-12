<?php

namespace App\Livewire;

use App\Models\Departement;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListeDepartement extends Component
{

    use WithPagination;

    // Le code pour spécifier qu'on veut utiliser le theme de bootstrap pour la pagination
    protected $paginationTheme = 'bootstrap';


    // fonction qui permet de supprimer un département
    public function confirmDelete($id)
    {
        $selectedItemId = Departement::find($id);
        $selectedItemId->delete();
       // toastr()->warning('Le departement est supprimé avec succès!', 'Suppression', ['positionClass' => 'toast-top-right']);
        return redirect()->Route('admin.departements')->with('delete', 'Le département est supprimé avec succès');
        // return redirect()->route('admin.departements')->with('delete', 'Le département est supprimé avec succès');
    }


    // fonction pour enregistrer un département : debut
    public $nom;

    public $departement;

        public $search ="";

    public function store(Departement $departement)
    {
        // règles de validation
        $this->validate(
            [
                'nom' => 'required|string|unique:departements,nom',
            ],
            [
                'nom.required' => "Le nom de l'utilisateur est obligatoire.",
                'nom.unique' => "Ce departement existe déjà",
            ]
        );

        try {
            $departement = new Departement();
            $departement->nom = $this->nom;
            $departement->save();
           // toastr()->success('Le departement a été enregistré avec succès!', 'Félicitations', ['positionClass' => 'toast-top-right']);
            return redirect()->Route('admin.departements')->with('message', 'Le departement a été enregistré avec succès');
            //  return redirect()->Route('admin.departements')->with('message', 'Le departement a été enregistré avec succès');
        } catch (\Exception $e) {
           // toastr()->error('Erreur lors de l\'enregistrement du département!', 'Erreur', ['positionClass' => 'toast-top-right']);
            return redirect()->back();
        }

    }
    // fonction pour enregistrer un département : fin

    public function render()
    {

    // pour changer la langue en français
     Carbon::setLocale('fr');
        $word = '%' . $this->search . '%';
    
    if (!empty($this->search)) {
      $departements = Departement::where('nom', 'like', $word)->paginate(5);
    } else {
        $departements = Departement::latest()->paginate(10);
     
    }


        return view('livewire.liste-departement', compact('departements'));
    }
}
