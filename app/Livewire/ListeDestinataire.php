<?php

namespace App\Livewire;

use App\Models\Destinataire;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListeDestinataire extends Component
{

     public $search = "";

  use WithPagination;

  // Le code pour spécifier qu'on veut utiliser le theme de bootstrap pour la pagination
  protected $paginationTheme = 'bootstrap';

  public function confirmDelete($id)
  {
    $selectedItemId = Destinataire::find($id);
    $selectedItemId->delete();
    //toastr()->success('L\'expediteur à été supprimé', 'Suppression', ['positionClass' => 'toast-top-center']);
    return redirect()->route('destinataires')->with('delete','L\'expediteur supprimé avec succès');
  }
    public function render()
    {
      // pour changer la langue en français
      Carbon::setLocale('fr');
        $listeDestinataire = Destinataire::latest()->paginate(10);
        return view('livewire.liste-destinataire', compact('listeDestinataire'));
    }
}
