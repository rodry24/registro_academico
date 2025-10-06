<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <h1 class="mb-4 text-primary"><i class="bi bi-journal-plus"></i> <?= $titulo ?></h1>
    
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">⚠️ Error de Validación</h4>
            <p>Por favor, corrija los siguientes errores:</p>
            <ul class="mb-0">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card shadow-lg">
        <div class="card-body">
            <form action="<?= base_url('carreras/guardar') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="row mb-4">
                    <h5 class="card-title text-secondary border-bottom pb-2">Datos de la Carrera</h5>
                    
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?= old('nombre') ?>" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" id="codigo" name="codigo" class="form-control" value="<?= old('codigo') ?>" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="duracion" class="form-label">Duración (años)</label>
                        <input type="number" id="duracion" name="duracion" class="form-control" value="<?= old('duracion') ?>" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select id="categoria_id" name="categoria_id" class="form-select" required>
                            <option value="">-- Seleccionar Categoría --</option>
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= (old('categoria_id') == $cat['id']) ? 'selected' : '' ?>>
                                    <?= $cat['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="profesor_id" class="form-label">Profesor a Cargo</label>
                        <select id="profesor_id" name="profesor_id" class="form-select" required>
                            <option value="">-- Seleccionar Profesor --</option>
                            <?php foreach ($profesores as $prof): ?>
                                <option value="<?= $prof['id'] ?>" <?= (old('profesor_id') == $prof['id']) ? 'selected' : '' ?>>
                                    <?= $prof['nombre'] ?> <?= $prof['apellido'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('carreras') ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al Listado
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Guardar Carrera
                    </button>
                </div>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>