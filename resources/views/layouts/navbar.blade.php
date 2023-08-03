
<nav class="navbar clearHeader">

    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html">Projet kpekpe</a> </div>
    </div>
</nav>
<section>

    <aside id="leftsidebar" class="sidebar">

        <div class="user-info">
            <div class="admin-image"> <img src="" alt="img admin"> </div>
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
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Rendez-vous</span> </a>
                    <ul class="ml-menu">
                        <li><a href="rendezvous.html">Prendre Rendez-vous</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Docteurs</span> </a>
                    <ul class="ml-menu">
                        <li><a href="docteurs.html">Tout les docteurs</a></li>
                        <li><a href="ajouter-doc.html">Ajouter un docteur</a></li>
                        <li><a href="profile-doc.html">Profile docteur</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Patients</span> </a>
                    <ul class="ml-menu">
                        <li><a href="patients.html">tout les patients</a></li>
                        <li><a href="ajouter-patient.html">Ajouter un paient</a></li>
                        <li><a href="patient-profile.html">Profile patient</a></li>
                    </ul>
                </li>

                <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Pages utiles</span> </a>
                    <ul class="ml-menu">
                        <li> <a href="connexion.html">Connexion</a> </li>
                        <li> <a href="enregistrement.html">Enregistrement</a> </li>
                        <li> <a href="oublie.html">Mot de pass oublié</a> </li>
                        <li> <a href="404.html">Page 404</a> </li>
                        <li> <a href="500.html">Page 500</a> </li>
                    </ul>
                </li>

            </ul>
        </div>

    </aside>

</section>
