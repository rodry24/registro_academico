<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

    <h1 class="mb-4 text-warning"><i class="bi bi-pencil-square"></i> <?= $titulo ?>: <span class="text-secondary"><?= $estudiante['nombre'] ?> <?= $estudiante['apellido'] ?></span></h1>
    
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
            <form action="<?= base_url('estudiantes/actualizar') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $estudiante['id'] ?>">
                
                <div class="row mb-4">
                    <h5 class="card-title text-secondary border-bottom pb-2">Datos Personales</h5>
                    
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" 
                               value="<?= old('nombre', $estudiante['nombre']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" 
                               value="<?= old('apellido', $estudiante['apellido']) ?>" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control" 
                               value="<?= old('dni', $estudiante['dni']) ?>" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" 
                               value="<?= old('telefono', $estudiante['telefono']) ?>" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <?php 
                        $fnac = old('fecha_nacimiento', $estudiante['fecha_nacimiento']);
                        // ✅ MEJOR MANEJO DE FECHAS
                        if (!empty($fnac) && $fnac != '0000-00-00') {
                            $fecha_formateada = date('Y-m-d', strtotime($fnac));
                        } else {
                            $fecha_formateada = '';
                        }
                        ?>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" 
                               value="<?= $fecha_formateada ?>" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="form-control" 
                               value="<?= old('direccion', $estudiante['direccion']) ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <h5 class="card-title text-secondary border-bottom pb-2">Datos Académicos</h5>
                    
                    <div class="col-md-8 mb-3">
                        <label for="carrera_id" class="form-label">Carrera</label>
                        <select id="carrera_id" name="carrera_id" class="form-select" required>
                            <?php foreach ($carreras as $carrera): ?>
                                <option value="<?= $carrera['id'] ?>" 
                                    <?= (old('carrera_id', $estudiante['carrera_id']) == $carrera['id']) ? 'selected' : '' ?>>
                                    <?= $carrera['nombre'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                        <?php 
                        $fing = old('fecha_ingreso', $estudiante['fecha_ingreso']);
                        // ✅ MEJOR MANEJO DE FECHAS
                        if (!empty($fing) && $fing != '0000-00-00') {
                            $fecha_ingreso_formateada = date('Y-m-d', strtotime($fing));
                        } else {
                            $fecha_ingreso_formateada = '';
                        }
                        ?>
                        <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control" 
                               value="<?= $fecha_ingreso_formateada ?>" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('estudiantes') ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al Listado
                    </a>
                    <button type="submit" class="btn btn-warning text-dark">
                        <i class="bi bi-arrow-up-circle"></i> Actualizar Estudiante
                    </button>
                </div>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>