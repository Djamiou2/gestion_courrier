<div class="row p-4 pt-5  ">
    <div class="col-10 align-items-center justify-content-center mb-2 ">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un destinataire
                </h3>
            </div>
            <form role="form" wire:submit.prevent="store" method="POST">
                @csrf
                @method('POST')

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

                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="nom" name="nom"
                                class="form-control @error('nom') is-invalid @enderror">

                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>contact</label>
                            <input type="tel" class="form-control @error('contact') is-invalid @enderror"
                                wire:model="contact" name="contact">
                            @error('contact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label> Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                wire:model="email" name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Adresse</label>
                            <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                                wire:model="adresse" name="adresse">
                            @error('adresse')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="p-1 d-flex justify-content-between">

                        <a href="{{ route('destinataires') }}">
                            <button type="button" class="btn btn-danger">
                                Retouner à la liste </button>
                        </a>

                        <button type="submit" class="btn btn-primary">Enregistrer</button>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
