<?php

namespace App\Livewire;

use App\Models\Expediteur;
use App\Models\Expediteurs;
use Livewire\Component;
use Livewire\WithPagination;

class ListeExpediteur extends Component
{

    // Pour afficher la liste des utilisateurs

  public $search = "";

  use WithPagination;

  // Le code pour spécifier qu'on veut utiliser le theme de bootstrap pour la pagination
  protected $paginationTheme = 'bootstrap';

  public function confirmDelete($id)
  {
    $selectedItemId = Expediteurs::find($id);
    $selectedItemId->delete();
    //toastr()->success('L\'expediteur à été supprimé', 'Suppression', ['positionClass' => 'toast-top-center']);
    return redirect()->route('expediteurs')->with('delete','L\'expediteur supprimé avec succès');
  }
    public function render()
    {
        $listeExpediteur = Expediteurs::latest()->paginate(10);
        return view('livewire.liste-expediteur', compact('listeExpediteur') );
    }
}
