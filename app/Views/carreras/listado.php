<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <h1 class="mb-4 text-primary"><i class="bi bi-book-half"></i> <?= $titulo ?></h1>

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
        <a href="<?= base_url('carreras/crear') ?>" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle"></i> Registrar Nueva Carrera
        </a>
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered caption-top">
            <caption class="text-secondary">Oferta académica actual</caption>
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Duración (años)</th>
                    <th>Categoría</th>
                    <th>Profesor a Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carreras as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= $c['nombre'] ?></td>
                    <td><?= $c['codigo'] ?></td>
                    <td><?= $c['duracion'] ?></td>
                    <td><?= $c['nombre_categoria'] ?></td>
                    <td><?= $c['nombre_profesor_a_cargo'] ?></td>
                    <td>
                        <a href="<?= base_url('carreras/editar/'.$c['id']) ?>" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil"></i> Editar</a>
                        <a href="<?= base_url('carreras/eliminar/'.$c['id']) ?>" 
                           onclick="return confirm('¿Confirma la eliminación de <?= $c['nombre'] ?>?')"
                           class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>