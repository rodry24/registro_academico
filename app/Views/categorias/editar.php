<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <!-- Header Mejorado -->
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-warning rounded-circle p-3 me-3">
                        <i class="bi bi-pencil-square text-dark fs-4"></i>
                    </div>
                    <div>
                        <h1 class="h3 mb-0 text-dark"><?= $titulo ?></h1>
                        <p class="text-muted mb-0">Editando: <span class="fw-semibold"><?= $categoria['nombre'] ?></span></p>
                    </div>
                </div>
                
                <!-- Alertas Mejoradas -->
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="d-flex">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                            <div>
                                <h5 class="alert-heading mb-2">⚠️ Error de Validación</h5>
                                <p class="mb-1">Por favor, corrija los siguientes errores:</p>
                                <ul class="mb-0 ps-3">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Card del Formulario -->
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-warning text-dark py-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-pencil-square me-2"></i>Editar Categoría
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('categorias/actualizar') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
                            
                            <!-- Campo Nombre -->
                            <div class="mb-4">
                                <label for="nombre" class="form-label fw-semibold">
                                    <i class="bi bi-fonts me-1 text-warning"></i>Nombre de la Categoría
                                </label>
                                <input type="text" id="nombre" name="nombre" 
                                       class="form-control form-control-lg <?= session('errors.nombre') ? 'is-invalid' : '' ?>" 
                                       value="<?= old('nombre', $categoria['nombre']) ?>" 
                                       placeholder="Ej: Ingeniería, Ciencias Sociales, Arte"
                                       required>
                                <div class="form-text">Mínimo 3 caracteres, solo letras y espacios</div>
                            </div>

                            <!-- Campo Descripción -->
                            <div class="mb-4">
                                <label for="descripcion" class="form-label fw-semibold">
                                    <i class="bi bi-text-paragraph me-1 text-warning"></i>Descripción
                                </label>
                                <textarea id="descripcion" name="descripcion" 
                                          class="form-control <?= session('errors.descripcion') ? 'is-invalid' : '' ?>" 
                                          rows="4" 
                                          placeholder="Describa el propósito o características de esta categoría..."
                                          required><?= old('descripcion', $categoria['descripcion']) ?></textarea>
                                <div class="form-text">Máximo 255 caracteres</div>
                            </div>
                            
                            <!-- Botones Mejorados -->
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <a href="<?= base_url('categorias') ?>" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Volver al Listado
                                </a>
                                <button type="submit" class="btn btn-warning text-dark btn-lg px-4">
                                    <i class="bi bi-arrow-up-circle me-2"></i>Actualizar Categoría
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?= $this->endSection() ?>