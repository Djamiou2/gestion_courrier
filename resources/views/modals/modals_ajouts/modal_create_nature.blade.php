<!-- Modal -->
<div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="AddNewModalLabel" aria-hidden="true">
    <!--class="modal-dialog modal-dialog-centered"-->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddNewModalLabel">CREATION DE NATURE COURRIER</h5>
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
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" wire:model="nom"
                                    class="form-control @error('nom') is-invalid @enderror" name="nom">
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="card-footer mb-3">
                                <button type=" submit" class="btn btn-primary">Enregistrer</button>
                                <a href="{{ route('courriers') }}">
                                    <button type="button" class="btn btn-danger">Retour à la liste des
                                        services</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
