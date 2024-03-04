<div class="row p-4 pt-5 ">
    <div class="container-fluid align-items-center justify-content-center mb-2 ">

        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        @if (session('message'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    toast: true,
                    title: '  {{ session('
                          message ') }}',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
        @endif

        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de modification du profil
                </h3>
            </div>
            <form role="form" wire:submit.prevent="update" method="POST">
                @csrf
                @method('POST')

                <div class="card-body">
                    <div class="form-group">
                        <label>Nom du département</label>
                        <input type="text" wire:model="nom" class="form-control @error('nom') is-invalid @enderror"
                            name="nom">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer mb-3">
                    <button type=" submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('admin.profils.profils') }}">
                        <button type="button" class="btn btn-danger">Retour à la liste des profils</button>
                    </a>
                </div>
        </div>
        <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->
</div>
</div>
