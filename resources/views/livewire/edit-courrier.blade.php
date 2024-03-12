<!-- resources/views/livewire/courrier-create.blade.php -->

<div class="row p-4 pt-5">
    <div class="col-12 align-items-center justify-content-center mb-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>
                    Indexation de courrier
                </h3>
            </div>
            <form role="form" method="POST" wire:submit.prevent="update">

                @csrf
                @method('POST')

                <div class="card-body">
                    <div class="row">
                        {{-- Première colonne --}}
                        <div class="col-md-6">
                            {{-- Objet --}}
                            <div class="form-group">
                                <label>Objet</label>
                                <input type="text" wire:model="objet" name="objet"
                                    class="form-control @error('objet') is-invalid @enderror">
                                @error('objet')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- contenu --}}
                            <div class="form-group">
                                <label>Contenu</label>
                                <textarea wire:model="contenu" name="contenu"
                                    class="form-control resize-vertical resize-horizontal @error('contenu') is-invalid @enderror"></textarea>
                                @error('contenu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Fichier --}}
                            <div class="form-group">
                                <label class="form-label" for="fichier">Joindre Fichier(s) :</label>
                                <input type="file" wire:model="fichier" name="fichier" id="fichier"
                                    class="form-control @error('fichier') is-invalid @enderror">
                                @error('fichier')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Type --}}
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control @error('type') is-invalid @enderror" wire:model="type"
                                    name="type">
                                    <option value="">---------</option>
                                    <option value="entant">entrant</option>
                                    <option value="sortant">sortant</option>
                                    <option value="sortant">interne</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Nature --}}
                            <div class="form-group ">
                                <label for="nature_id" class="mr-2">Nature</label>
                                <div class="d-flex align-items-center">
                                    <select
                                        class="form-control select2bs4 select2-hidden-accessible flex-grow-1 @error('nature_id')is-invalid @enderror"
                                        style="width: 100%;" id="nature_id" wire:model="nature_id" name="nature_id"
                                        tabindex="-1" aria-hidden="true">
                                        <option value="" selected disabled>
                                            Sélectionner une nature
                                        </option>
                                        @foreach ($listeNature as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('nature_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <a href="#">
                                        <button type="button" class="btn btn-primary rounded-circle ml-2 add-button"
                                            style="width: 32px; height: 32px; padding: 0; position: relative;">
                                            <i class="fas fa-plus"
                                                style="font-size: 18px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                                        </button>
                                        {{-- <button type="button" class="btn btn-primary rounded-circle ml-2 add-button"
                                            data-toggle="modal" data-target="#AddNewModal"
                                            style="width: 32px; height: 32px; padding: 0; position: relative;"><i
                                                class="fas fa-plus"
                                                style="font-size: 18px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                            </i>
                                        </button> --}}
                                        {{-- @include('modals.modals_ajouts.modal_create_nature') --}}
                                    </a>
                                </div>
                            </div>

                            {{-- Date de signature --}}
                            <div class="form-group">
                                <label>Signé le :</label>
                                <input type="date" class="form-control @error('date_signature') is-invalid @enderror"
                                    wire:model="date_signature" name="date_signature">
                                @error('date_signature')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Date d'arrivée --}}
                            <div class="form-group">
                                <label>Arrivée le </label>
                                <input type="date" class="form-control @error('date_arrivee') is-invalid @enderror"
                                    wire:model="date_arrivee" name="date_arrivee">
                                @error('date_arrivee')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Délai de traitement --}}
                            <div class="form-group">
                                <label>Délai de traitement</label>
                                <input type="text" wire:model="delai_de_traitement" name="delai_de_traitement"
                                    class="form-control @error('delai_de_traitement') is-invalid @enderror">
                                @error('delai_de_traitement')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Selection service --}}
                            <div class="form-group ">
                                <label for="nature" class="mr-2">Service</label>
                                <div class=" d-flex align-items-center">
                                    <select class="form-control @error('service_id') is-invalid @enderror"
                                        wire:model="service_id" name="service_id">
                                        <option value="">--------</option>
                                        @foreach ($listeService as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                        @endforeach
                                        @error('service_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </select>
                                    <a href="{{ route('admin.services.create') }}">
                                        <button type="button" class="btn btn-primary rounded-circle ml-2 add-button"
                                            style="width: 32px; height: 32px; padding: 0; position: relative;">
                                            <i class="fas fa-plus"
                                                style="font-size: 18px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                                        </button>
                                        {{-- <a href="{{ route('admin.services.create') }}"> --}}
                                        {{-- <button type="button" class="btn btn-primary rounded-circle ml-2 add-button"
                                            data-toggle="modal" data-target="#AddNewModal"
                                            style="width: 32px; height: 32px; padding: 0; position: relative;"><i
                                                class="fas fa-plus"
                                                style="font-size: 18px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                            </i>
                                        </button> --}}
                                    </a>
                                </div>
                                {{-- @include('modals.modals_ajouts.modal_create_service') --}}
                            </div>
                            {{-- Selection expéditeur --}}
                            <div class="form-group ">
                                <label for="nature" class="mr-2">Expéditeur</label>
                                <div class=" d-flex align-items-center">
                                    <select class="form-control @error('expediteur_id') is-invalid @enderror"
                                        wire:model="expediteur_id" name="expediteur_id">
                                        <option value="">--------</option>
                                        @foreach ($listeExpediteur as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                        @endforeach
                                        @error('expediteur_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </select>
                                    <a href=" {{ route('expediteurs.create') }}">
                                        <button type="button" class="btn btn-primary rounded-circle ml-2 add-button"
                                            style="width: 32px; height: 32px; padding: 0; position: relative;">
                                            <i class="fas fa-plus"
                                                style="font-size: 18px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                                        </button>
                                        {{-- <button type="button" class="btn btn-primary rounded-circle ml-2 add-button"
                                            data-toggle="modal" data-target="#AddNewModal"
                                            style="width: 32px; height: 32px; padding: 0; position: relative;"><i
                                                class="fas fa-plus"
                                                style="font-size: 18px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                            </i>
                                        </button> --}}
                                    </a>
                                </div>
                                {{--  @include('modals.modals_ajouts.modal_create_expediteur') --}}
                            </div>
                            {{-- Selection de priorité --}}
                            <div class="form-group">
                                <label>Priorité</label>
                                <select class="form-control @error('importance') is-invalid @enderror"
                                    wire:model="importance" name="importance">
                                    <option value="">---------</option>
                                    <option value="important">important</option>
                                    <option value="tres_important">très important</option>
                                    <option value="urgent">urgent</option>
                                    <option value="important_et_urgent">Important et urgent</option>
                                </select>
                                @error('importance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Deuxième colonne --}}
                        <div class="col-md-6">
                            @if ($fichier)
                                <div class="form-group">
                                    <label>Nom réel du fichier choisi:</label>
                                    <p>{{ $fichier->getClientOriginalName() }}</p>
                                    @if (in_array($fichier->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif']))
                                        <label for="contenu">Aperçu du Fichier:</label>
                                        <img src="{{ $fichier->temporaryUrl() }}" alt="Aperçu de l'image"
                                            width="500" height="400">
                                    @elseif (in_array($fichier->getClientOriginalExtension(), ['pdf', 'doc', 'docx']))
                                        <label for="contenu">Aperçu du Fichier:</label>
                                        <iframe src="{{ $fichier->temporaryUrl() }}" width="500"
                                            height="1000"></iframe>
                                    @else
                                        <p>Aperçu non disponible pour ce type de fichier</p>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

                {{-- Boutons --}}
                <div class="p-2 d-flex justify-content-between">
                    <a href="{{ route('courriers') }}">
                        <button type="button" class="btn btn-danger">Retour</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>

        </div>

        </form>
    </div>
</div>
</div>

@livewireScripts()
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.hook('element.updated', (el, component) => {
            if (el.getAttribute('wire:model') === 'fichier') {
                let fichierInput = document.getElementById('fichier');
                let nomFichierP = document.getElementById('nom-du-fichier');
                let contenuTextarea = document.getElementById('contenu-du-fichier-textarea');

                fichierInput.addEventListener('change', function() {
                    if (fichierInput.files.length > 0) {
                        let fichier = fichierInput.files[0];
                        nomFichierP.textContent = fichier.name;

                        let reader = new FileReader();
                        reader.onload = function(e) {
                            contenuTextarea.value = e.target.result;
                        };
                        reader.readAsText(fichier);
                    } else {
                        nomFichierP.textContent = '';
                        contenuTextarea.value = '';
                    }
                });
            }
        });
    });
</script>
