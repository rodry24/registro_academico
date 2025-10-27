<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Instituto Académico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url('css/main.css') ?>" rel="stylesheet">
</head>
<body class="form-body">
    <div class="form-container">
        <form class="form-box" action="<?= base_url('login') ?>" method="POST">
            <div class="feature-icon" style="margin: 0 auto 1.5rem; width: 80px; height: 80px;">
                <i class="bi bi-person-circle" style="font-size: 2rem;"></i>
            </div>
            
            <h2>Iniciar Sesión</h2>

            <!-- Mostrar errores -->
            <?php if (session()->get('error')): ?>
                <div class="alert-message alert-error">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    <?= session()->get('error') ?>
                </div>
            <?php endif; ?>

            <!-- Mostrar éxito -->
            <?php if (session()->get('success')): ?>
                <div class="alert-message alert-success">
                    <i class="bi bi-check-circle me-2"></i>
                    <?= session()->get('success') ?>
                </div>
            <?php endif; ?>

            <div class="input-group">
                <label for="email">
                    <i class="bi bi-envelope me-2"></i>Correo electrónico
                </label>
                <input type="email" id="email" name="email" placeholder="tu@email.com" required 
                       value="<?= old('email') ?>">
            </div>

            <div class="input-group">
                <label for="password">
                    <i class="bi bi-lock me-2"></i>Contraseña
                </label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>

            <button type="submit">
                <i class="bi bi-box-arrow-in-right me-2"></i>Entrar
            </button>

            <p class="form-text">
                ¿No tienes cuenta? <a href="<?= base_url('register') ?>">Regístrate aquí</a>
            </p>
            
            <div class="text-center mt-4">
                <a href="<?= base_url('/') ?>" class="text-decoration-none text-gray-500">
                    <i class="bi bi-arrow-left me-2"></i>Volver al inicio
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>