<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Sistema Instituto' ?> | Instituto Académico</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #2563eb;
            --dark-blue: #1e40af;
            --light-blue: #3b82f6;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
            color: var(--gray-800);
            min-height: 100vh;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--gray-200);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--gray-900) !important;
            font-size: 1.4rem;
        }
        
        .nav-link {
            color: var(--gray-700) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-blue) !important;
            transform: translateY(-1px);
        }
        
        .card-modern {
            background: white;
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .card-modern:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-color: var(--primary-blue);
        }
        
        .btn-modern {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            color: white;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%231e40af" fill-opacity="0.05" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            border-color: var(--primary-blue);
            transform: translateY(-2px);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-title {
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            border-radius: 2px;
        }
        
        .floating-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--gray-200);
        }
        
        .chat-widget {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
        }
        
        .chat-button {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
            transition: all 0.3s ease;
        }
        
        .chat-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }
        
        .news-badge {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .news-ticker {
            background: var(--gray-800);
            color: white;
            padding: 12px 0;
            font-size: 0.9rem;
            border-bottom: 1px solid var(--gray-700);
        }
        
        .breadcrumb-modern {
            background: transparent;
            padding: 0;
            margin-bottom: 2rem;
        }
        
        .breadcrumb-item a {
            color: var(--gray-600);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .breadcrumb-item a:hover {
            color: var(--primary-blue);
        }
        
        .footer {
            background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
            color: white;
            margin-top: auto;
        }
        
        .footer a {
            color: var(--gray-300);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--primary-blue);
            transform: translateY(-2px);
        }
    </style>
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
                        🎓 Inscripciones abiertas para el ciclo 2024 | 📚 Nuevos programas académicos disponibles | 🏆 Reconocimiento a la excelencia académica | 📅 Próximos eventos institucionales
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="bi bi-mortarboard-fill me-2 gradient-text"></i>
                Instituto Académico
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>">
                            <i class="bi bi-house me-1"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-people me-1"></i> Gestión
                        </a>
                        <ul class="dropdown-menu">
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
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-info-circle me-1"></i> Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-telephone me-1"></i> Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs -->
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-modern">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

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
    <footer class="footer mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3 text-white">
                        <i class="bi bi-mortarboard-fill me-2"></i>Instituto Académico
                    </h5>
                    <p class="text-gray-300 mb-3">
                        Comprometidos con la excelencia educativa y la formación integral de profesionales competentes.
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
                        <li class="mb-2"><a href="<?= base_url('estudiantes') ?>">Estudiantes</a></li>
                        <li class="mb-2"><a href="<?= base_url('profesores') ?>">Profesores</a></li>
                        <li class="mb-2"><a href="<?= base_url('carreras') ?>">Carreras</a></li>
                        <li class="mb-2"><a href="#">Admisiones</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6 class="fw-bold mb-3 text-white">Contacto</h6>
                    <div class="mb-3">
                        <i class="bi bi-geo-alt me-2 text-primary"></i>
                        <span class="text-gray-300">Av. Educación 123, Ciudad</span>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-telephone me-2 text-primary"></i>
                        <span class="text-gray-300">(123) 456-7890</span>
                    </div>
                    <div class="mb-0">
                        <i class="bi bi-envelope me-2 text-primary"></i>
                        <span class="text-gray-300">info@instituto.edu</span>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6 class="fw-bold mb-3 text-white">Horarios</h6>
                    <div class="text-gray-300">
                        <div class="mb-2">
                            <strong>Lunes - Viernes:</strong><br>
                            8:00 AM - 6:00 PM
                        </div>
                        <div class="mb-2">
                            <strong>Sábados:</strong><br>
                            9:00 AM - 1:00 PM
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
                            Sistema de Gestión Académica v2.1
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
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>