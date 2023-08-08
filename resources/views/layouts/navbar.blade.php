
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
            {{asset('/storage/'. Auth::user()->avatar)}}
            @endauth
            @auth

            @endauth
            " alt="img admin"> </div>
            <div class="admin-action-info"> <span>Bienvenue !</span>
                <h3>
                    @auth
                    {{Auth::user()->name}}
                    @endauth
                    @guest
                    Dr. Kevine KPE
                    @endguest
                </h3>
            </div>
        </div>

        <div class="menu">
            <ul class="list">
                <li class="header">NAVIGATION PRINCIPALE</li>
                <li class="active open"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                @if (Auth::user()->role == 'secretaire')
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Gestion des Patients</span> </a>
                    <ul class="ml-menu">
                        <li><a href="">tout les Examens</a></li>
                        <li><a href="">Ajouter un Examen</a></li>
                    </ul>
                </li>
                @endif
                @if (Auth::user()->role == 'docteur')
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Gestion des Examens</span> </a>
                        <ul class="ml-menu">
                            <li><a href="{{route('admin.examens.index')}}">Les Patients</a></li>
                            <li><a href="{{route('admin.examens.create')}}">Ajouter un Examen</a></li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="{{route('logout')}}" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Deconnexion</span> </a>
                </li>
            </ul>
        </div>

    </aside>

</section>
