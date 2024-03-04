<div class="row p-4 pt-5 ">
    <div class="col-10 align-items-center justify-content-center mb-2 ">

        <div>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        @if (session('error'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    toast: true,
                    title: ' erreur d\'enregistrement!',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
        @endif


        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">

                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouveau service
                </h3>
            </div>

            <form role="form" wire:submit.prevent="store" method="POST">
                @csrf
                @method('POST')


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
        </div>
        <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->
</div>
</div>
