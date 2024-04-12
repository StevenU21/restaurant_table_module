<ul class="navbar-nav">
    <li class="nav-item {{ Request::route()->named('dashboard') ? 'active' : '' }}">
        <a class="nav-link {{ Request::route()->named('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Módulo Gestión Mesas</h6>
<ul class="navbar-nav">

    <li class="nav-item {{ Request::route()->named('types.index') ? 'active' : '' }}">
        <a class="nav-link {{ Request::route()->named('types.index') ? 'active' : '' }}"
            href="{{ route('types.index') }}">
            <i class="fas fa-book text-green"></i> Tipos
        </a>
    </li>

    <li class="nav-item {{ Request::route()->named('tables.index') ? 'active' : '' }}">
        <a class="nav-link {{ Request::route()->named('tables.index') ? 'active' : '' }}"
            href="{{ route('tables.index') }}">
            <i class="fas fa-th text-orange"></i> Mesas
        </a>
    </li>

    <li class="nav-item {{ Request::route()->named('assignments.index') ? 'active' : '' }}">
        <a class="nav-link {{ Request::route()->named('assignments.index') ? 'active' : '' }}"
            href="{{ route('assignments.index') }}">
            <i class="fas fa-tasks text-yellow"></i> Asignaciones
        </a>
    </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('invoices.index') }}">
            <i class="fas fa-book text-red"></i> Facturas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('auditories.index') }}">
            <i class="fas fa-clock text-purple"></i> Historial
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-sign-out-alt text-gray"></i> Cerrar Sesión
        </a>
    </li>
</ul>
