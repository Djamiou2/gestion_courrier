<?php

namespace App\Livewire;

use App\Models\Departement;
use App\Models\Profil;
use App\Models\Service;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListeService extends Component
{
    use WithPagination;
    // Le code pour spécifier qu'on veut utiliser le theme de bootstrap pour la pagination
    protected $paginationTheme = 'bootstrap';

    // la foncton pour enregistrer un service : debut
    public $nom;

    public $departement_id;
    public $search = "";


    public function store(Service $service)
    {
        $this->validate(
            [
                'nom' => 'required|string|unique:services,nom',
                'departement_id' => 'required'
            ],
            [
                'nom.required' => 'Le nom est obligatoire',
                'nom.unique' => 'Ce nom est déjà utilisé',
                'departement_id.required' => 'Le département est obligatoire',
            ]
        );


        try {
            $service = new Service();
            $service->nom = $this->nom;
            $service->departement_id = $this->departement_id;
            $service->save();
           // toastr()->success('Le service a été enregistré avec succès!', 'Félicitations', ['positionClass' => 'toast-top-right']);
            return redirect()->Route('admin.services')->with('message', 'Le service a été enregistré avec succès');
            // return redirect()->Route('admin.services')->with('message', 'Le service a été enregistré avec succès');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement du service');
        }
    }
    // la foncton pour enregistrer un service : fin


    // Le code pour supprimer un service
    public function confirmDelete($id)
    {
        $selectedItemId = Service::find($id);
        $selectedItemId->delete();
       // toastr()->warning('Le service est supprimé avec succès!', 'Félicitations', ['positionClass' => 'toast-top-right']);
        return redirect()->route('admin.services')->with('delete', 'Le service est supprimé avec succès');
        //return redirect()->route('admin.services')->with('delete', 'Le service est supprimé avec succès');
    }
    public function render()
    {
        $word = '%' . $this->search . '%';
    
    if (!empty($this->search)) {
      $listeServices = Service::where('nom', 'like', $word)->paginate(5);
    } else {
      $listeServices = Service::latest()->paginate(10);
    }
              // pour changer la langue en français
      Carbon::setLocale('fr');

        //$listeServices = Service::latest()->paginate(10);

        // liste des departements
        $listeDepartements = Departement::all();

        return view('livewire.liste-service', compact('listeServices', 'listeDepartements'));
    }
}
