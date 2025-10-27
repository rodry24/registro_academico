<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titulo) ? $titulo : 'Panel Profesor' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('css/main.css') ?>" rel="stylesheet">
   
</head>
<body class="profesor-dashboard">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg profesor-header shadow">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="#">
                <i class="bi bi-person-badge me-2"></i>Panel Profesor
            </a>
            <div class="navbar-nav ms-auto">
                <span class="nav-link text-white"><?= isset($usuario) ? $usuario : 'Profesor' ?></span>
                <a class="nav-link text-white" href="<?= base_url('logout') ?>">
                    <i class="bi bi-box-arrow-right"></i> Salir
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <!-- Bienvenida -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card module-card border-0 bg-white">
                    <div class="card-body p-4 text-center">
                        <h1 class="h3 fw-bold text-success">Bienvenido, Profesor</h1>
                        <p class="text-muted mb-0">Panel de gestión docente</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información del Profesor -->
        <div class="row">
            <div class="col-md-8">
                <div class="card module-card border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Mis Cursos Asignados</h5>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-semibold">Matemáticas Avanzadas</span>
                                        <small class="d-block text-muted">Ingeniería en Sistemas - Grupo A</small>
                                    </div>
                                    <span class="badge bg-success">32 estudiantes</span>
                                </div>
                            </div>
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-semibold">Programación I</span>
                                        <small class="d-block text-muted">Licenciatura en Informática - Grupo B</small>
                                    </div>
                                    <span class="badge bg-success">28 estudiantes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>