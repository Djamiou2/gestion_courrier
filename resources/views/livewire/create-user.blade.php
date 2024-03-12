<div class="row p-4 pt-5  ">
    <div class="col-8 align-items-center justify-content-center mb-2 ">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel
                    utilisateur
                </h3>
            </div>
            <form role="form" method="POST" wire:submit.prevent="store">
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
                            <label>Prenom</label>
                            <input type="text" wire:model="prenom" name="prenom"
                                class="form-control @error('prenom') is-invalid @enderror">

                            @error('prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control @error('sexe') is-invalid @enderror" wire:model="sexe"
                            name="sexe">
                            <option value="">---------</option>
                            <option value="H">H</option>
                            <option value="F">F</option>
                        </select>
                        @error('sexe')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>contact</label>
                        <input type="tel" class="form-control @error('contact') is-invalid @enderror"
                            wire:model="contact" name="contact">
                        @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                            wire:model="email" name="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="text" class="form-control" disabled placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label>Profil</label>
                        <select class="form-control @error('profil_id') is-invalid @enderror" wire:model="profil_id"
                            name="profil_id">
                            <option value="">---------</option>
                            @foreach ($profils as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                        @error('profil_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Service</label>
                        <select class="form-control @error('service_id') is-invalid @enderror" wire:model="service_id"
                            name="service_id">
                            <option value="">---------</option>
                            @foreach ($services as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="p-2 d-flex justify-content-between">

                        <a href="{{ route('admin.users.users') }}">
                            <button type="button" class="btn btn-danger">Retouner à la liste des
                                utilisateurs</button>
                        </a>

                        <button type=" submit" class="btn btn-primary">Enregistrer</button>


                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
