<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <h1 class="mb-4 text-primary"><i class="bi bi-person-video"></i> <?= $titulo ?></h1>

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
        <a href="<?= base_url('profesores/crear') ?>" class="btn btn-success shadow-sm">
            <i class="bi bi-person-plus"></i> Registrar Nuevo Profesor
        </a>
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered caption-top">
            <caption class="text-secondary">Lista de profesores activos</caption>
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profesores as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['nombre'] ?></td>
                    <td><?= $p['apellido'] ?></td>
                    <td><?= $p['dni'] ?></td>
                    <td><?= $p['telefono'] ?></td>
                    <td>
                        <a href="<?= base_url('profesores/editar/'.$p['id']) ?>" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil"></i> Editar</a>
                        <a href="<?= base_url('profesores/eliminar/'.$p['id']) ?>" 
                           onclick="return confirm('¿Confirma la eliminación de <?= $p['nombre'] ?> <?= $p['apellido'] ?>?')"
                           class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>