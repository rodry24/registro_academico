<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-5 fw-bold mb-4">
                    Gestión Académica <span class="gradient-text">Inteligente</span>
                </h1>
                <p class="lead mb-4 text-gray-300">
                    Plataforma moderna para la administración integral de tu institución educativa. 
                    Simplifica procesos, mejora la experiencia y optimiza la gestión académica.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="<?= base_url('estudiantes') ?>" class="btn btn-modern">
                        <i class="bi bi-people-fill me-2"></i> Comenzar
                    </a>
                    <a href="#features" class="btn btn-outline-light">
                        <i class="bi bi-play-circle me-2"></i> Ver Demo
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left">
                <div class="feature-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <h4 class="text-light mt-3">Sistema Optimizado</h4>
                <p class="text-gray-300">Rendimiento y eficiencia en cada proceso</p>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Stats -->
<section class="container my-5">
    <div class="dashboard-grid">
        <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-number" id="total-estudiantes">0</div>
            <h6 class="text-gray-600">Estudiantes Activos</h6>
            <small class="text-gray-500">+5% este mes</small>
        </div>
        <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-number" id="total-profesores">0</div>
            <h6 class="text-gray-600">Profesores</h6>
            <small class="text-gray-500">Cuerpo docente</small>
        </div>
        <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-number" id="total-carreras">0</div>
            <h6 class="text-gray-600">Carreras</h6>
            <small class="text-gray-500">Programas activos</small>
        </div>
        <div class="stat-card" data-aos="fade-up" data-aos-delay="400">
            <div class="stat-number">98%</div>
            <h6 class="text-gray-600">Satisfacción</h6>
            <small class="text-gray-500">Usuarios satisfechos</small>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="container my-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="section-title">Funcionalidades Principales</h2>
        <p class="text-gray-600">Todo lo que necesitas para una gestión académica eficiente</p>
    </div>
    
    <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card card-modern h-100 text-center p-4">
                <div class="feature-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h5 class="fw-bold mb-3">Gestión Estudiantil</h5>
                <p class="text-gray-600 mb-3">
                    Administra información estudiantil, historiales académicos y procesos de inscripción de manera centralizada.
                </p>
                <a href="<?= base_url('estudiantes') ?>" class="btn btn-modern btn-sm">Explorar</a>
            </div>
        </div>
        
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card card-modern h-100 text-center p-4">
                <div class="feature-icon">
                    <i class="bi bi-person-badge"></i>
                </div>
                <h5 class="fw-bold mb-3">Gestión Docente</h5>
                <p class="text-gray-600 mb-3">
                    Controla el cuerpo docente, asignaciones académicas y evaluación del desempeño profesional.
                </p>
                <a href="<?= base_url('profesores') ?>" class="btn btn-modern btn-sm">Explorar</a>
            </div>
        </div>
        
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card card-modern h-100 text-center p-4">
                <div class="feature-icon">
                    <i class="bi bi-journal-text"></i>
                </div>
                <h5 class="fw-bold mb-3">Programas Académicos</h5>
                <p class="text-gray-600 mb-3">
                    Gestiona carreras, planes de estudio, mallas curriculares y categorías de especialización.
                </p>
                <a href="<?= base_url('carreras') ?>" class="btn btn-modern btn-sm">Explorar</a>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Overview -->
<section class="container my-5">
    <div class="row">
        <div class="col-lg-8" data-aos="fade-right">
            <div class="floating-card">
                <h4 class="section-title mb-4">Resumen del Sistema</h4>
                <div class="row text-center">
                    <div class="col-4 mb-3">
                        <div class="text-primary fw-bold fs-3">156</div>
                        <small class="text-gray-600">Estudiantes</small>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="text-primary fw-bold fs-3">28</div>
                        <small class="text-gray-600">Profesores</small>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="text-primary fw-bold fs-3">12</div>
                        <small class="text-gray-600">Carreras</small>
                    </div>
                </div>
                <div class="mt-4">
                    <h6 class="fw-bold mb-3">Actividad Reciente</h6>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-plus text-success me-2"></i>
                                    <span>Nuevo estudiante registrado</span>
                                </div>
                                <small class="text-gray-500">Hace 2 horas</small>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-book text-primary me-2"></i>
                                    <span>Actualización de carrera</span>
                                </div>
                                <small class="text-gray-500">Hace 5 horas</small>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-badge text-warning me-2"></i>
                                    <span>Nuevo profesor agregado</span>
                                </div>
                                <small class="text-gray-500">Ayer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4" data-aos="fade-left">
            <div class="floating-card h-100">
                <h4 class="section-title mb-4">Accesos Rápidos</h4>
                <div class="d-grid gap-2">
                    <a href="<?= base_url('estudiantes/crear') ?>" class="btn btn-outline-modern d-flex align-items-center justify-content-center py-3">
                        <i class="bi bi-person-plus me-2"></i>
                        Nuevo Estudiante
                    </a>
                    <a href="<?= base_url('profesores/crear') ?>" class="btn btn-outline-modern d-flex align-items-center justify-content-center py-3">
                        <i class="bi bi-person-badge-plus me-2"></i>
                        Nuevo Profesor
                    </a>
                    <a href="<?= base_url('carreras') ?>" class="btn btn-outline-modern d-flex align-items-center justify-content-center py-3">
                        <i class="bi bi-journal-plus me-2"></i>
                        Gestionar Carreras
                    </a>
                    <a href="<?= base_url('categorias') ?>" class="btn btn-outline-modern d-flex align-items-center justify-content-center py-3">
                        <i class="bi bi-tags me-2"></i>
                        Ver Categorías
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Calendar Section -->
<section class="container my-5">
    <div class="floating-card" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="section-title mb-3">Calendario Académico</h4>
                <p class="text-gray-600 mb-4">
                    Mantente informado sobre los eventos y fechas importantes del ciclo académico.
                </p>
                <div class="row text-center">
                    <div class="col-4">
                        <div class="border rounded p-3">
                            <div class="text-primary fw-bold fs-4">15</div>
                            <small class="text-gray-600">Marzo</small>
                            <div class="text-gray-700 small mt-1">Inscripciones</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="border rounded p-3">
                            <div class="text-primary fw-bold fs-4">20</div>
                            <small class="text-gray-600">Marzo</small>
                            <div class="text-gray-700 small mt-1">Exámenes</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="border rounded p-3">
                            <div class="text-primary fw-bold fs-4">21</div>
                            <small class="text-gray-600">Septiembre</small>
                            <div class="text-gray-700 small mt-1">Día Estudiante</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <i class="bi bi-calendar-week"></i>
                </div>
                <h5 class="fw-bold mt-3">Eventos Programados</h5>
                <p class="text-gray-600">Nunca pierdas una fecha importante</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
// Inicializar AOS
AOS.init({
    duration: 800,
    once: true
});

// Chat functionality
document.getElementById('chat-toggle').addEventListener('click', function() {
    const chatBox = document.getElementById('chat-box');
    chatBox.classList.toggle('d-none');
});

document.getElementById('chat-send').addEventListener('click', sendMessage);
document.getElementById('chat-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

function sendMessage() {
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    
    if (message) {
        addMessage(message, 'user');
        input.value = '';
        
        setTimeout(() => {
            const responses = [
                "Puedo ayudarte con información sobre estudiantes, profesores y carreras.",
                "Para crear un nuevo estudiante, ve a la sección Estudiantes → Nuevo Estudiante.",
                "¿Necesitas ayuda con alguna funcionalidad específica del sistema?",
                "Puedes contactar al administrador del sistema para soporte técnico."
            ];
            const randomResponse = responses[Math.floor(Math.random() * responses.length)];
            addMessage(randomResponse, 'bot');
        }, 1000);
    }
}

function addMessage(text, sender) {
    const chatMessages = document.getElementById('chat-messages');
    const messageDiv = document.createElement('div');
    messageDiv.className = `alert ${sender === 'user' ? 'alert-primary' : 'alert-light'} border mb-2`;
    messageDiv.innerHTML = `<small>${text}</small>`;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Animar contadores
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 40);
}

// Inicializar contadores cuando son visibles
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounter(document.getElementById('total-estudiantes'), 156);
            animateCounter(document.getElementById('total-profesores'), 28);
            animateCounter(document.getElementById('total-carreras'), 12);
            observer.unobserve(entry.target);
        }
    });
});

observer.observe(document.querySelector('.dashboard-grid'));

// Tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>
<?= $this->endSection() ?>