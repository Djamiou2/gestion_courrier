<aside class="control-sidebar control-sidebar-dark">

    <div class="p-3">
        <div class="card" style="background: #42C2FF;">
            <div class="card-body bg-dark box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/user_color.png') }}"
                        alt="Photo de profil utilisateur">
                </div>
                <h3 class="profile-username text-center ellipsis">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">{{ getUserFullName() }}</font>
                    </font>
                </h3>
                <p class="text-muted text-center">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">{{ getProfileName() }}</font>
                    </font>
                </p>
                <ul class="list-group bg-dark mb-3">
                    <li class="list-group-item">
                        <a href="{{ route('password.change') }}" class="d-flex align-items-center "><i
                                class="fa fa-lock pr-2"></i><b>Mot de
                                passe</b> </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b>Mon
                                profile</b> </a>
                    </li>
                </ul>

                <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Déconnexion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
</aside>
