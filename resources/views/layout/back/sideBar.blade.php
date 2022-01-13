<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <div class="mt-4"></div>

                    <li>
                        <a class="nav-link" id="navLinkDashboard" href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i><span>Tableau de bord</span>
                        </a>
                    </li>

                    <li class="dropdown mt-1">
                        <a class="nav-link menu-title" id="navLinkMember" href="javascript:void(0)">
                            <i class="fa fa-user"></i>
                            <span>Membres</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>

                        <ul class="nav-submenu menu-content" id="currentSubMenu" style="display: block;">
                            <li>
                                <a href="{{ route('admin.membres.list_membre') . '?type=adherent' }}"
                                    class="active">Adhérents</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.membres.list_membre') . '?type=beneficiaire' }}"
                                    class="active">Bénéficiaire</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown mt-1">
                        <a class="nav-link menu-title" id="navLinkActivite" href="javascript:void(0)">
                            <i class="fa fa-user"></i>
                            <span>Activitées</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>

                        <ul class="nav-submenu menu-content" id="activitesSubMenu" style="display: block;">
                            <li>
                                <a href="{{ route('admin.activites') . '?type=activities' }}"
                                    class="active">Activitées</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.activites') . '?type=social_activities' }}"
                                    class="active">Activitées Sociales</a>
                            </li>
                        </ul>
                    </li>

                    <li class="mt-1">
                        <a class="nav-link" id="navLinkPartenaires" href="{{ route('admin.partenaires') }}">
                            <i class="fa fa-institution"></i>
                            <span>Partenaires</span>
                        </a>
                    </li>

                    <li class="dropdown mt-1">
                        <a class="nav-link menu-title" id="navLinkBlogs" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-edit">
                                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                            </svg>
                            <span>Médiathèques</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>

                        <ul class="nav-submenu menu-content" id="currentSubMenu" style="display: block;">
                            <li><a href="{{ route('admin.blogs') }}" class="active">Articles</a></li>
                            <li><a href="">Photos</a></li>
                            <li><a href="">Videos</a></li>
                            <li><a href="{{ route('admin.flashInfo') }}">Flash info</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
