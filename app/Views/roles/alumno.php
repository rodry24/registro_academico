<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titulo) ? $titulo : 'Panel Estudiante' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('css/main.css') ?>" rel="stylesheet">
    <style>
        .estudiante-dashboard { background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); min-height: 100vh; }
        .estudiante-header { background: linear-gradient(135deg, #0369a1 0%, #0c4a6e 100%); color: white; }
        .module-card { transition: all 0.3s ease; border: none; border-radius: 12px; }
        .module-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="estudiante-dashboard">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg estudiante-header shadow">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="#">
                <i class="bi bi-person-circle me-2"></i>Panel Estudiante
            </a>
            <div class="navbar-nav ms-auto">
                <span class="nav-link text-white"><?= isset($usuario) ? $usuario : 'Estudiante' ?></span>
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
                        <h1 class="h3 fw-bold text-primary">Bienvenido, Estudiante</h1>
                        <p class="text-muted mb-0">Tu portal académico personal</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información Académica -->
        <div class="row">
            <div class="col-md-6">
                <div class="card module-card border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Mis Materias</h5>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold">Matemáticas Avanzadas</span>
                                    <span class="badge bg-primary">8.5</span>
                                </div>
                            </div>
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold">Programación I</span>
                                    <span class="badge bg-primary">9.2</span>
                                </div>
                            </div>
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold">Base de Datos</span>
                                    <span class="badge bg-primary">7.8</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card module-card border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Próximas Actividades</h5>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-semibold">Examen Matemáticas</span>
                                        <small class="d-block text-muted">Unidad 3 - Álgebra Lineal</small>
                                    </div>
                                    <small class="text-muted">15 Mar</small>
                                </div>
                            </div>
                            <div class="list-group-item px-0 border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="fw-semibold">Entrega Proyecto Programación</span>
                                        <small class="d-block text-muted">Sistema de gestión</small>
                                    </div>
                                    <small class="text-muted">20 Mar</small>
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