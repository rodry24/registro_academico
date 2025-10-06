<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <h1 class="mb-4 text-primary"><i class="bi bi-tags"></i> <?= $titulo ?></h1>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('mensaje') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <p class="mb-4">
        <a href="<?= base_url('categorias/crear') ?>" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle"></i> Registrar Nueva Categoría
        </a>
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered caption-top w-50">
            <caption class="text-secondary">Clasificaciones de carreras</caption>
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $cat): ?>
                <tr>
                    <td><?= $cat['id'] ?></td>
                    <td><?= $cat['nombre'] ?></td>
                    <td><?= $cat['descripcion'] ?></td>
                    <td>
                        <a href="<?= base_url('categorias/editar/'.$cat['id']) ?>" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil"></i> Editar</a>
                        <a href="<?= base_url('categorias/eliminar/'.$cat['id']) ?>" 
                           onclick="return confirm('¿Confirma la eliminación de la categoría <?= $cat['nombre'] ?>?')"
                           class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>