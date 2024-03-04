<?php

namespace App\Livewire;

use App\Models\Courrier;
use Livewire\Component;
use Livewire\WithPagination;

class ListeCourrier extends Component
{
    public $search = "";

    use WithPagination;

// Le code pour spécifier qu'on veut utiliser le theme de bootstrap pour la pagination
protected $paginationTheme = 'bootstrap';

public function confirmDelete($id)
{
  $selectedItemId = Courrier::find($id);
  $selectedItemId->delete();
  //toastr()->success('Le courrier à été supprimé', 'Suppression', ['positionClass' => 'toast-top-center']);
  return redirect()->route('courriers')->with('message','Le courrier a été enregistré avec succès !!!');
}

    public function render()
    {
        $listeCourrier = Courrier::latest()->paginate(10);
        return view('livewire.liste-courrier', compact('listeCourrier') );
    }
}
