<nav class="mt-2 text-custom " style="font-size: 12px; font-family: Arial;">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item {{ setMenuClasse('home', 'menu-open') }}">
            <a href="{{ route('home') }}" class="nav-link  {{ setMenuClasse('home', 'active') }}">
                <i class="nav-icon fas fa-home"></i>
                <p>TABLEAU DE BORD </p>
            </a>
        </li>

        @can('admin')
            <!-- Gestion de l'entreprise -->
            <li class="nav-item {{ setMenuClasse('departements', 'menu-open') }}">
                <a href="#" class="nav-link {{ setMenuClasse('departements', 'active') }}">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        GESTION ENTREPRISE
                    </p><i class="right fas fa-angle-left"></i>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.departements') }}"
                            class="nav-link {{ setMenuActive('admin.departements') }} ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Départements</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- ajout de " active" à a -->
                        <a href="{{ route('admin.services') }}" class="nav-link {{ setMenuActive('admin.services') }}">
                            <i class="fa fa-briefcase" aria-hidden="false"></i>
                            <p>Services</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan


        @can('admin')
            <li class="nav-item {{ setMenuClasse('admin.users.', 'menu-open') }}">
                <a href="#" class="nav-link  {{ setMenuClasse('admin.users.', 'active') }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        GESTION EMPLOYES
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('admin.users.users.create') }}"
                            class="nav-link {{ setMenuActive('admin.users.users.create') }} ">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>Ajouter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.users') }}"
                            class="nav-link {{ setMenuActive('admin.users.users') }} ">
                            <i class="nav-icon fas fa-list-ul"></i>
                            <p>Liste employés</p>
                        </a>
                    </li>
                    {{--  <li class="nav-item">
                        <a href="{{ route('admin.profils.profils') }}"
                            class="nav-link {{ setMenuActive('admin.profils.profils') }} ">
                            <i class="fas fa-list-ul"></i>
                            <p>Liste profils</p>
                        </a>
                    </li> --}}
                </ul>
            </li>
        @endcan

        @can('admin')
            <li class="nav-item {{ setMenuClasse('expediteurs', 'menu-open') }}">
                <a href="#" class="nav-link  {{ setMenuClasse('expediteurs', 'active') }}">
                    <i class="nav-icon fas fa-users "></i>
                    {{-- <i class="fas fa-folder"></i> --}}
                    <p>
                        EXPEDITEURS/DESTINATAIRES
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    {{-- <li class="nav-item">
                        <a href="{{ route('expediteurs.create') }}"
                            class="nav-link {{ setMenuActive('expediteurs.create') }} ">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>Ajouter </p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('expediteurs') }}" class="nav-link {{ setMenuActive('expediteurs') }} ">
                            <i class="fas fa-paper-plane"></i>
                            <p>Liste expediteurs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('destinataires') }}" class="nav-link {{ setMenuActive('destinataires') }} ">
                            <i class="fas fa-user"></i>
                            <p>Liste destinataires</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        <!-- Gestion des courriers -->
        <li class="nav-item {{ setMenuClasse('courriers', 'menu-open') }}">
            <a href="#" class="nav-link{{ setMenuClasse('courriers', 'active') }}">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>
                    GESTION COURRIERS
                </p> <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('courriers.create') }}"
                        class="nav-link
                {{ setMenuActive('courriers.create') }}">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Ajouter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('courriers') }}" class="nav-link
          {{ setMenuActive('courriers') }}">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Liste</p>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Menu Rapport --}}

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-chart-bar"></i>
                <p>RAPPORTS</p>
            </a>
        </li>



    </ul>

</nav>


<style>
    .text-custom {
        color: hsl(0, 100%, 99%);
    }

    a {
        color: hsl(0, 100%, 99%);
    }
</style>
