<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('css/main.css') ?>" rel="stylesheet">
    <style>
        .admin-dashboard { background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: 100vh; }
        .admin-header { background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%); color: white; }
        .module-card { transition: all 0.3s ease; border: none; border-radius: 12px; }
        .module-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; }
        .quick-actions .btn { border-radius: 10px; font-weight: 600; }
    </style>
</head>
<body class="admin-dashboard">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg admin-header shadow">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="#">
                <i class="bi bi-speedometer2 me-2"></i>Panel Administrador
            </a>
            <div class="navbar-nav ms-auto">
                <span class="nav-link text-white"><?= $usuario ?></span>
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
                <div class="card module-card border-0">
                    <div class="card-body p-4">
                        <h1 class="h3 fw-bold text-primary">Bienvenido, Administrador</h1>
                        <p class="text-muted mb-0">Gestión completa del sistema académico</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estadísticas Rápidas -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="stats-grid">
                    <div class="card module-card border-0 bg-primary text-white">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-people-fill display-6 mb-2"></i>
                            <h3 class="fw-bold">156</h3>
                            <p class="mb-0">Estudiantes Activos</p>
                        </div>
                    </div>
                    <div class="card module-card border-0 bg-success text-white">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-person-badge display-6 mb-2"></i>
                            <h3 class="fw-bold">28</h3>
                            <p class="mb-0">Profesores</p>
                        </div>
                    </div>
                    <div class="card module-card border-0 bg-warning text-white">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-journal-text display-6 mb-2"></i>
                            <h3 class="fw-bold">12</h3>
                            <p class="mb-0">Carreras</p>
                        </div>
                    </div>
                    <div class="card module-card border-0 bg-info text-white">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-collection display-6 mb-2"></i>
                            <h3 class="fw-bold">8</h3>
                            <p class="mb-0">Categorías</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Módulos Principales -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="fw-bold mb-3">Módulos de Gestión</h3>
                <div class="row g-4">
                    <!-- Gestión Estudiantil -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card module-card border-0 h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon bg-primary mb-3 mx-auto">
                                    <i class="bi bi-people-fill text-white"></i>
                                </div>
                                <h5 class="fw-bold">Estudiantes</h5>
                                <p class="text-muted mb-3">Gestión completa de estudiantes</p>
                                <div class="d-grid gap-2">
                                    <a href="<?= base_url('estudiantes') ?>" class="btn btn-outline-primary btn-sm">Ver Lista</a>
                                    <a href="<?= base_url('estudiantes/crear') ?>" class="btn btn-primary btn-sm">Nuevo Estudiante</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gestión Docente -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card module-card border-0 h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon bg-success mb-3 mx-auto">
                                    <i class="bi bi-person-badge text-white"></i>
                                </div>
                                <h5 class="fw-bold">Profesores</h5>
                                <p class="text-muted mb-3">Administración del cuerpo docente</p>
                                <div class="d-grid gap-2">
                                    <a href="<?= base_url('profesores') ?>" class="btn btn-outline-success btn-sm">Ver Lista</a>
                                    <a href="<?= base_url('profesores/crear') ?>" class="btn btn-success btn-sm">Nuevo Profesor</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gestión Académica -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card module-card border-0 h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon bg-warning mb-3 mx-auto">
                                    <i class="bi bi-journal-text text-white"></i>
                                </div>
                                <h5 class="fw-bold">Carreras</h5>
                                <p class="text-muted mb-3">Programas y planes de estudio</p>
                                <div class="d-grid gap-2">
                                    <a href="<?= base_url('carreras') ?>" class="btn btn-outline-warning btn-sm">Ver Lista</a>
                                    <a href="<?= base_url('carreras/crear') ?>" class="btn btn-warning btn-sm">Nueva Carrera</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categorías -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card module-card border-0 h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon bg-info mb-3 mx-auto">
                                    <i class="bi bi-collection text-white"></i>
                                </div>
                                <h5 class="fw-bold">Categorías</h5>
                                <p class="text-muted mb-3">Clasificación y organización</p>
                                <div class="d-grid gap-2">
                                    <a href="<?= base_url('categorias') ?>" class="btn btn-outline-info btn-sm">Ver Lista</a>
                                    <a href="<?= base_url('categorias/crear') ?>" class="btn btn-info btn-sm">Nueva Categoría</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones Rápidas y Reportes -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card module-card border-0">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="fw-bold mb-0">Actividad Reciente</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person-plus text-success me-3"></i>
                                        <div>
                                            <span class="fw-semibold">Nuevo estudiante registrado</span>
                                            <small class="d-block text-muted">María González se unió a Ingeniería en Sistemas</small>
                                        </div>
                                    </div>
                                    <small class="text-muted">Hace 2 horas</small>
                                </div>
                            </div>
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-journal-plus text-primary me-3"></i>
                                        <div>
                                            <span class="fw-semibold">Nueva carrera creada</span>
                                            <small class="d-block text-muted">Licenciatura en Inteligencia Artificial</small>
                                        </div>
                                    </div>
                                    <small class="text-muted">Hace 5 horas</small>
                                </div>
                            </div>
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person-badge text-warning me-3"></i>
                                        <div>
                                            <span class="fw-semibold">Profesor actualizado</span>
                                            <small class="d-block text-muted">Dr. Roberto Martínez - Nuevo horario</small>
                                        </div>
                                    </div>
                                    <small class="text-muted">Ayer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card module-card border-0">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="fw-bold mb-0">Acciones Rápidas</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2 quick-actions">
                            <a href="<?= base_url('estudiantes/crear') ?>" class="btn btn-outline-primary text-start">
                                <i class="bi bi-person-plus me-2"></i> Nuevo Estudiante
                            </a>
                            <a href="<?= base_url('profesores/crear') ?>" class="btn btn-outline-success text-start">
                                <i class="bi bi-person-badge-plus me-2"></i> Nuevo Profesor
                            </a>
                            <a href="<?= base_url('carreras/crear') ?>" class="btn btn-outline-warning text-start">
                                <i class="bi bi-journal-plus me-2"></i> Nueva Carrera
                            </a>
                            <a href="<?= base_url('categorias/crear') ?>" class="btn btn-outline-info text-start">
                                <i class="bi bi-tags me-2"></i> Nueva Categoría
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>