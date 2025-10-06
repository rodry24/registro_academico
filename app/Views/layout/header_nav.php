<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <i class="bi bi-house-door-fill"></i> Instituto CI4
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('estudiantes') ?>">Estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('carreras') ?>">Carreras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('profesores') ?>">Profesores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('categorias') ?>">Categorías</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>