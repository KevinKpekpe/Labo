
<nav class="navbar clearHeader">

    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html">Labo App</a> </div>
    </div>
</nav>
<section>

    <aside id="leftsidebar" class="sidebar">

        <div class="user-info">
            <div class="admin-image"> <img src="
            @auth
            {{asset('images/'. Auth::user()->avatar)}}
            @endauth
            @auth

            @endauth
            " alt="img admin"> </div>
            <div class="admin-action-info"> <span>Bienvenue !</span>
                <h3>
                    @auth
                    {{Auth::user()->name}}
                    @endauth
                </h3>
            </div>
        </div>

        <div class="menu">
            <ul class="list">
                <li class="header">NAVIGATION PRINCIPALE</li>
                <li class="active open"><a href="{{route('admin.home')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts"></i><span>Gestions des Utilisateurs</span> </a>
                    <ul class="ml-menu">
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Docteur</span> </a>
                            <ul class="ml-menu">
                                <li><a href="{{route('admin.docteurs.index')}}">Liste de Docteurs</a></li>
                                <li><a href="{{route('admin.docteurs.create')}}">Ajouter un Docteur</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Secretaire</span></a>
                            <ul class="ml-menu">
                                <li><a href="{{route('admin.secretaires.index')}}">Liste de Secretaire</a></li>
                                <li><a href="{{route('admin.secretaires.create')}}">Ajouter un Secretaire</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Gestion des Patients</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('admin.patients.index')}}">tout les patients</a></li>
                        <li><a href="{{route('admin.patients.create')}}">Ajouter un paient</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi  zmdi-assignment"></i><span>Gestion des Examens</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('admin.examens.index')}}">tout les Examens</a></li>
                        <li><a href="{{route('admin.examens.create')}}">Ajouter un Examen</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Gestion des Bons</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('admin.bonlabos.index')}}">Afficher Tous les Bons</a></li>
                        <li><a href="{{route('admin.bonlabos.create')}}">Ajouter un Bon</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="menu-toggle"><i class="zmdi zmdi zmdi-power"></i><span>Deconnexion</span> </a>
                </li>

            </ul>
        </div>

    </aside>

</section>
