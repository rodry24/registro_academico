<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <div class="container-fluid">
        
        <!-- Header Mejorado -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <div class="bg-primary rounded-circle p-3 me-3">
                    <i class="bi bi-tags text-white fs-4"></i>
                </div>
                <div>
                    <h1 class="h2 mb-0 text-primary"><?= $titulo ?></h1>
                    <p class="text-muted mb-0">Gestione las categorías de carreras académicas</p>
                </div>
            </div>
            <a href="<?= base_url('categorias/crear') ?>" class="btn btn-success btn-lg shadow-sm">
                <i class="bi bi-plus-circle me-2"></i>Nueva Categoría
            </a>
        </div>

        <!-- Alertas Mejoradas -->
        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div><?= session()->getFlashdata('mensaje') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                    <div><?= session()->getFlashdata('error') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Card de la Tabla -->
        <div class="card shadow-lg border-0">
            <div class="card-header bg-light py-3">
                <h5 class="card-title mb-0 text-dark">
                    <i class="bi bi-list-ul me-2"></i>Lista de Categorías Registradas
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th width="80" class="text-center">ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th width="200" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($categorias)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                            No hay categorías registradas
                                        </div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($categorias as $cat): ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-primary">#<?= $cat['id'] ?></span>
                                    </td>
                                    <td class="fw-semibold"><?= $cat['nombre'] ?></td>
                                    <td>
                                        <span class="text-truncate d-inline-block" style="max-width: 300px;" 
                                              title="<?= $cat['descripcion'] ?>">
                                            <?= $cat['descripcion'] ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('categorias/editar/'.$cat['id']) ?>" 
                                               class="btn btn-warning btn-sm"
                                               title="Editar categoría">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="<?= base_url('categorias/eliminar/'.$cat['id']) ?>" 
                                               onclick="return confirm('¿Confirma la eliminación de la categoría \'<?= $cat['nombre'] ?>\'?')"
                                               class="btn btn-danger btn-sm"
                                               title="Eliminar categoría">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if (!empty($categorias)): ?>
            <div class="card-footer bg-light py-3">
                <small class="text-muted">
                    <i class="bi bi-info-circle me-1"></i>Total: <?= count($categorias) ?> categoría(s) registrada(s)
                </small>
            </div>
            <?php endif; ?>
        </div>

    </div>

<?= $this->endSection() ?>