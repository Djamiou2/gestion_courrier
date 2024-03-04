<div class="row p-4 pt-5  ">
    <div class="col-12 align-items-center justify-content-center mb-2 ">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>
                    Formulaire d'enregistrement du courrier
                </h3>
            </div>
            <form role="form" method="POST" wire:submit.prevent="store">
                @csrf
                @method('POST')

                <div class="card-body">
                    {{-- Objet --}}
                    <div class="form-group">
                        <label>Objet</label>
                        <input type="text" wire:model="objet" name="objet"
                            class="form-control @error('objet') is-invalid @enderror">
                        @error('objet')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Contenu --}}
                    <div class="form-group">
                        <label>Contenu</label>
                        <textarea wire:model="contenu" name="contenu"
                            class="form-control resize-vertical resize-horizontal @error('contenu') is-invalid @enderror"></textarea>
                        @error('contenu')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Fichiers, pièces jointes  --}}
                    <div class="form-group">
                        <label class="form-label" for="pieces_jointes">Joindre Fichier(s) :</label>
                        <input type="file" wire:model="pieces_jointes" name="pieces_jointes" id="pieces_jointes"
                            class="form-control @error('pieces_jointes') is-invalid @enderror">
                        @error('pieces_jointes')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- type et nature --}}
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2 ">
                            <label>Type</label>
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

                        <div class="form-group">
                            <label for="nature">Nature</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;"
                                id="nature" name="nature" tabindex="-1" aria-hidden="true">
                                <option value="" selected disabled>
                                    Sélectionner une nature
                                </option>
                                @foreach ($listeNature as $item)
                                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <label>Nature</label>
                            <select class="form-control @error('nature_id') is-invalid @enderror" wire:model="nature_id"
                                name="nature_id">
                                <option value="">---------</option>
                                @foreach ($listeNature as $item)
                                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                @endforeach
                            </select>
                            @error('nature_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                    </div>


                    {{-- Les dates --}}
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Date arrivée</label>
                            <input type="date" class="form-control @error('date_arrivee') is-invalid @enderror"
                                wire:model="date_arrivee" name="date_arrivee">
                            @error('date_arrivee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Date d'envoie</label>
                            <input type="date" class="form-control @error('date_envoi') is-invalid @enderror"
                                wire:model="date_envoi" name="date_envoi">
                            @error('date_envoi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- importance --}}
                    <div class="form-group">
                        <label>Important</label>
                        <select class="form-control @error('importance') is-invalid @enderror" wire:model="importance"
                            name="importance">
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

                    {{-- Service et expediteur --}}

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Service</label>
                            <select class="form-control @error('service_id') is-invalid @enderror"
                                wire:model="service_id" name="service_id">
                                <option value="">--------</option>
                                @foreach ($listeService as $item)
                                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label>Expediteur</label>
                            <select class="form-control @error('expediteur_id') is-invalid @enderror"
                                wire:model="expediteur_id" name="expediteur_id">
                                <option value="">--------</option>
                                @foreach ($listeExpediteur as $item)
                                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                @endforeach
                            </select>
                            @error('expediteur_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Boutons : enregistrer et retourner --}}
                    <div class="p-5">
                        <button type=" submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('courriers') }}">
                            <button type="button" class="btn btn-danger">Retouner à la liste</button>
                        </a>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

@livewireScripts()
