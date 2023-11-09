<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <ul class="side-menu metismenu">
            <li class="{{ (request()->is('arbitros')) ? 'active' : '' }} {{ (request()->is('arbitros/create')) ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                    <span class="nav-label">Arbitros</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('/arbitros') }}">Lista de Arbitros</a>
                    </li>

                    <li>
                        <a href="{{ url('/arbitros/create') }}">Crear Arbitro</a>
                    </li>
                </ul>
            </li>

            <li class="{{ (request()->is('procesos')) ? 'active' : '' }} {{ (request()->is('procesos/create')) ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon ti-paint-roller"></i>
                    <span class="nav-label">Procesos</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('/procesos') }}">Lista de Procesos</a>
                    </li>

                    <li>
                        <a href="{{ url('/procesos/create') }}">Crear Proceso</a>
                    </li>
                </ul>
            </li>

            <li class="{{ (request()->is('personas')) ? 'active' : '' }} {{ (request()->is('personas/create')) ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                    <span class="nav-label">Demandados</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('/personas') }}">Lista de Demandados</a>
                    </li>

                    <li>
                        <a href="{{ url('/personas/create') }}">Crear Demandado</a>
                    </li>
                </ul>
            </li>

            <li class="{{ (request()->is('empresas')) ? 'active' : '' }} {{ (request()->is('empresas/create')) ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon ti-user"></i>
                    <span class="nav-label">Demandantes</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ url('/empresas') }}">Lista de Demandantes</a>
                    </li>

                    <li>
                        <a href="{{ url('/empresas/create') }}">Crear Demandante</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href=""><i class="sidebar-item-icon ti-home"></i>
                    <span class="nav-label">Solicitud de copias</span></a>
            </li>

            <li>
                <a href=""><i class="sidebar-item-icon ti-settings"></i>
                    <span class="nav-label">Configuración</span></a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a><i class="ti-announcement"></i></a>
            <a><i class="ti-calendar"></i></a>
            <a><i class="ti-comments"></i></a>
            <a><i class="ti-power-off"></i></a>
        </div>
    </div>
</nav>
