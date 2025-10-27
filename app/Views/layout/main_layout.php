<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?? 'Sistema Instituto' ?> | Instituto Académico</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- CSS PRINCIPAL -->
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
    
    <?= $this->renderSection('styles') ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- News Ticker -->
    <div class="news-ticker">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="news-badge">
                        <i class="bi bi-megaphone-fill"></i>
                        NOVEDADES
                    </span>
                </div>
                <div class="col">
                    <marquee behavior="scroll" direction="left" scrollamount="3">
                        🎓 Inscripciones abiertas para el ciclo 2026 | 📚 Nuevos programas académicos disponibles | 🏆 Reconocimiento a la excelencia académica | 📅 Próximos eventos institucionales
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-modern">
        <div class="container">
            <a class="navbar-brand navbar-brand-modern" href="<?= base_url() ?>">
                <i class="bi bi-mortarboard-fill me-2"></i>
                Instituto Académico
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern <?= current_url() == base_url() ? 'active' : '' ?>" href="<?= base_url() ?>">
                            <i class="bi bi-house me-1"></i> Inicio
                        </a>
                    </li>
                    <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-modern dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-people me-1"></i> Gestión
                        </a>
                        <ul class="dropdown-menu">
                            <?php if (session()->get('rol') == 'admin'): ?>
                            <li><a class="dropdown-item" href="<?= base_url('estudiantes') ?>">
                                <i class="bi bi-people-fill me-2"></i>Estudiantes
                            </a></li>
                            <li><a class="dropdown-item" href="<?= base_url('profesores') ?>">
                                <i class="bi bi-person-badge me-2"></i>Profesores
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= base_url('carreras') ?>">
                                <i class="bi bi-book me-2"></i>Carreras
                            </a></li>
                            <li><a class="dropdown-item" href="<?= base_url('categorias') ?>">
                                <i class="bi bi-tags me-2"></i>Categorías
                            </a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern" href="#features">
                            <i class="bi bi-info-circle me-1"></i> Funcionalidades
                        </a>
                    </li>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-modern dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i> <?= session()->get('nombre') ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if (session()->get('rol') == 'admin'): ?>
                                    <li><a class="dropdown-item" href="<?= base_url('admin') ?>">
                                        <i class="bi bi-speedometer2 me-2"></i>Panel Admin
                                    </a></li>
                                <?php elseif (session()->get('rol') == 'profesor'): ?>
                                    <li><a class="dropdown-item" href="<?= base_url('profesor') ?>">
                                        <i class="bi bi-person-badge me-2"></i>Panel Profesor
                                    </a></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="<?= base_url('alumno') ?>">
                                        <i class="bi bi-person-circle me-2"></i>Panel Estudiante
                                    </a></li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?= base_url('logout') ?>">
                                    <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                                </a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-modern" href="<?= base_url('login') ?>">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-modern" href="<?= base_url('register') ?>">
                                <i class="bi bi-person-plus me-1"></i> Registro
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs -->
    <?= $this->renderSection('breadcrumbs') ?>

    <!-- Main Content -->
    <main class="flex-grow-1">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Chat Widget -->
    <div class="chat-widget">
        <button class="chat-button" id="chat-toggle" data-bs-toggle="tooltip" title="Soporte en Línea">
            <i class="bi bi-chat-dots"></i>
        </button>
        <div class="card card-modern d-none mt-2" id="chat-box" style="width: 320px;">
            <div class="card-header bg-transparent border-bottom">
                <h6 class="mb-0"><i class="bi bi-headset me-2 text-primary"></i>Soporte en Línea</h6>
            </div>
            <div class="card-body" style="height: 250px; overflow-y: auto;" id="chat-messages">
                <div class="alert alert-light border">
                    <small>¡Hola! Soy tu asistente virtual. ¿En qué puedo ayudarte hoy?</small>
                </div>
            </div>
            <div class="card-footer bg-transparent border-top">
                <div class="input-group">
                    <input type="text" class="form-control border" id="chat-input" placeholder="Escribe tu mensaje...">
                    <button class="btn btn-modern" id="chat-send">
                        <i class="bi bi-send"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-modern">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3 text-white">
                        <i class="bi bi-mortarboard-fill me-2"></i>Instituto Académico
                    </h5>
                    <p class="text-gray-300 mb-3">
                        Ofrecemos carreras docentes y técnicas del nivel superior. Su enseñanza es gratuita y otorga títulos oficiales. Dependemos de la D.G.CyE.
                    </p>
                    <div class="social-links d-flex gap-2">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6 class="fw-bold mb-3 text-white">Enlaces Rápidos</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?= base_url('#') ?>">Estudiantes</a></li>
                        <li class="mb-2"><a href="<?= base_url('#') ?>">Profesores</a></li>
                        <li class="mb-2"><a href="<?= base_url('#') ?>">Carreras</a></li>
                        <li class="mb-2"><a href="#">Admisiones</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6 class="fw-bold mb-3 text-white">Contacto</h6>
                    <div class="mb-3">
                        <i class="bi bi-geo-alt me-2 text-primary"></i>
                        <span class="text-gray-300">Franklin 166, Chascomús</span>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-telephone me-2 text-primary"></i>
                        <span class="text-gray-300">(02241) 43-6710</span>
                    </div>
                    <div class="mb-0">
                        <i class="bi bi-envelope me-2 text-primary"></i>
                        <span class="text-gray-300">instituto57@gmail.com</span>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6 class="fw-bold mb-3 text-white">Horarios</h6>
                    <div class="text-gray-300">
                        <div class="mb-2">
                            <strong>Lunes - Viernes:</strong><br>
                            17:30 PM - 21:40 PM
                        </div>
                        <div class="mb-2">
                            <strong>Sábados:</strong><br>
                            Cerrado
                        </div>
                        <div>
                            <strong>Domingos:</strong><br>
                            Cerrado
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top border-gray-700 pt-4 mt-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-gray-400">
                            &copy; 2024 Instituto Académico. Todos los derechos reservados.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 text-gray-400">
                            Sistema de Gestión Académica
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Scripts Globales -->
    <script>
        // Inicializar AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Chat Widget
        document.getElementById('chat-toggle').addEventListener('click', function() {
            const chatBox = document.getElementById('chat-box');
            chatBox.classList.toggle('d-none');
        });

        // Tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>