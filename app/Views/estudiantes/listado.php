<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <h1 class="mb-4 text-primary"><i class="bi bi-people-fill"></i> <?= $titulo ?></h1>

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
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">⚠️ Errores de Validación</h4>
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <p class="mb-4">
        <a href="<?= base_url('estudiantes/crear') ?>" class="btn btn-success shadow-sm">
            <i class="bi bi-person-plus-fill"></i> Registrar Nuevo Estudiante
        </a>
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered caption-top">
            <caption class="text-secondary">Lista completa de estudiantes activos</caption>
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Carrera</th>
                    <th>Fecha Ingreso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $e): ?>
                <tr>
                    <td><?= $e['id'] ?></td>
                    <td><?= $e['nombre'] ?></td>
                    <td><?= $e['apellido'] ?></td>
                    <td><?= $e['dni'] ?></td>
                    <td><?= $e['nombre_carrera'] ?></td>
                    <td><?= $e['fecha_ingreso'] ?></td>
                    <td>
                        <a href="<?= base_url('estudiantes/editar/'.$e['id']) ?>" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil"></i> Editar</a>
                        <a href="<?= base_url('estudiantes/eliminar/'.$e['id']) ?>" 
                           onclick="return confirm('¿Confirma la eliminación de <?= $e['nombre'] ?> <?= $e['apellido'] ?>?')"
                           class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>