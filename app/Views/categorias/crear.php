<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <h1 class="mb-4 text-primary"><i class="bi bi-tag-fill"></i> <?= $titulo ?></h1>
    
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

    <div class="card shadow-lg w-75 mx-auto">
        <div class="card-body">
            <form action="<?= base_url('categorias/guardar') ?>" method="post">
                <?= csrf_field() ?>
                
                <h5 class="card-title text-secondary border-bottom pb-2 mb-4">Detalles de la Categoría</h5>
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?= old('nombre') ?>" required>
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required><?= old('descripcion') ?></textarea>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('categorias') ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al Listado
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Guardar Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>