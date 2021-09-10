<style>
    .navbar-light .navbar-toggler {
        color: white;
        border-color: rgba(0, 0, 0, .1);
    }

    .navbar-toggler {
        padding: .25rem .75rem;
        font-size: 0.98rem;
        line-height: 1;
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: box-shadow .15s ease-in-out;
    }

    .btn-group-vertical {
        flex-direction: column;
        align-items: center;
    }

    .btn-group-vertical>.btn,
    .btn-group-vertical>.btn-group {
        width: 60%;
    }
</style>

<nav class="navbar navbar-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" style="color:#649FA5" href="/proyecto-perros/php/vistas/page_principal">
            <img src="/proyecto-perros/recursos/logo.png" alt="Logo" width="40" height="40">
            Bromatologia | Municipalidad de Saladillo
        </a>
        <div class="d-flex">
            <?php if ($_SESSION["Rol"] == 1): ?>
                <div class="dropdown me-2">
                    <button class="btn btn-white border" style='color: #649fa5' type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-plus"></i>
                    </button>
                    <?php if ($_SESSION["Rol"] == 1): ?>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            <?php if ($carpeta_actual === "page_principal"): ?>
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarPerro">Nuevo perro</button>
                                </li>
                            <?php endif; ?>
                            <?php if (
                                $carpeta_actual === "page_propietarios" or
                                $carpeta_actual === "page_principal"
                            ): ?>
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarPropietario">Nuevo propietario</button>
                                </li>
                            <?php endif; ?>
                            <?php if ($carpeta_actual === "page_usuarios"): ?>
                                <li>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#agregarUsuario">Nuevo usuario</button>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <img src="/proyecto-perros/recursos/nav.png" class="navbar-toggler-icon"></img>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a class="navbar-brand" style="color:#649FA5" href="/proyecto-perros/php/vistas/page_principal">
                        <img src="/proyecto-perros/recursos/logo.png" alt="" width="40" height="40">
                        Bromatologia Saladillo
                    </a>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="btn-group-vertical">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <?php if ($_SESSION["Rol"] == 1): ?>
                            <li class="nav-item">
                                <?php if ($carpeta_actual !== "page_principal"): ?>
                                    <a class='btn btn-white' title="Usuarios" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_principal">
                                        <i class="fas fa-home"></i> Inicio
                                    </a>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <?php if ($carpeta_actual !== "page_usuarios"): ?>
                                    <a class="btn btn-white" title="Usuarios" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_usuarios">
                                        <i class="fas fa-users"></i> Usuarios
                                    </a>
                                <?php endif; ?>
                            </li>

                            <li class="nav-item">
                                <?php if ($carpeta_actual !== "page_propietarios"): ?>
                                    <a class='btn btn-white' title="Propietarios" style='color: #649fa5' href="/proyecto-perros/php/vistas/page_propietarios">
                                        <i class="fas fa-id-card"></i> Propietarios
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="btn btn-white" title="Cerrar sesion" style="color: #649fa5" href="/proyecto-perros/php/conexion/page_principal/cerrar_sesion.php">
                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesion
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
