<!-- Modal -->
<div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="AddNewModalLabel" aria-hidden="true">
    <!--class="modal-dialog modal-dialog-centered"-->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddNewModalLabel">CREATION DE SERVICE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Body -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création de service
                        </h3>
                    </div>
                    <form role="form" method="POST" wire:submit.prevent="store">
                        @csrf
                        @method('POST')

                        <div class="card-body">

                            <div class="form-group m-2">
                                <label>Département</label>
                                <select class="form-control @error('departement_id') is-invalid @enderror"
                                    wire:model="departement_id" name="departement_id">
                                    <option value="">-----</option>
                                    @foreach ($listeDepartements as $item)
                                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nom du service</label>
                                        <input type="text" wire:model="nom"
                                            class="form-control @error('nom') is-invalid @enderror" name="nom">
                                        @error('nom')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer mb-3">
                                <button type=" submit" class="btn btn-primary">Enregistrer</button>
                                <a href="{{ route('admin.services') }}">
                                    <button type="button" class="btn btn-danger">Retour à la liste des
                                        services</button>
                                </a>
                            </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
