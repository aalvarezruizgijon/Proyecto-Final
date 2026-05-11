<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Mis Reservas</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <link rel="stylesheet" href="../View/css/mis_reservas.css">
    <link rel="shortcut icon" href="../View/img/logo.png" type="image/x-icon">
</head>
<body>
    <?php include '../View/header.php' ?>

    <main class="main__container reservas-container">
        
        <?php if (isset($_SESSION['mensaje_exito'])): ?>
            <div class="alert alert-success alert-dismissible fade show rounded-custom" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?= $_SESSION['mensaje_exito'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['mensaje_exito']); ?>
        <?php endif; ?>

        <h2 class="text-center text-uppercase fw-bold mb-5 title-reservas text-primary-drivo">Mis Reservas</h2>

        <div class="container-mis-reservas mx-auto">
            
            <?php if (!empty($activas)): ?>
                <?php foreach ($activas as $reserva): 
                        $vehiculo = $reserva->getVehiculo();
                ?>
                <div class="card-proxima-reserva mb-5">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-5 text-center p-4">
                            <img src="../View/img/coches/<?= pathinfo($vehiculo->getImagen(), PATHINFO_FILENAME) ?>--sin_fondo.png" alt="<?= $vehiculo->getNombreCompleto() ?>" class="img-fluid car-img-proxima">
                        </div>
                        <div class="col-md-7 p-4 p-md-5">
                            <h4 class="text-primary-drivo mb-3 fs-5">Proxima Reserva: <?= $vehiculo->getNombreCompleto() ?> - Ref: DRV<?= str_pad($reserva->getId(), 6, "0", STR_PAD_LEFT) ?></h4>
                            <p class="mb-2 text-primary-drivo"><strong>Recogida:</strong> <?= date('d/m/Y, h A', strtotime($reserva->getFechaInicio())) ?>, Aeropuerto Sevilla</p>
                            <p class="mb-2 text-primary-drivo"><strong>Devolución:</strong> <?= date('d/m/Y, h A', strtotime($reserva->getFechaFin())) ?>, Aeropuerto Sevilla</p>
                            <?php
                                $estadoMap = [
                                    'Pendiente'  => ['label' => 'Pendiente',   'color' => '#d97706', 'bg' => '#fef3c7'],
                                    'Activa'     => ['label' => 'Confirmada',  'color' => '#065f46', 'bg' => '#d1fae5'],
                                    'Finalizada' => ['label' => 'Finalizada',  'color' => '#6b7280', 'bg' => '#e5e7eb'],
                                    'Cancelada'  => ['label' => 'Cancelada',   'color' => '#dc2626', 'bg' => '#fee2e2'],
                                ];
                                $est = $reserva->getEstado();
                                $info = $estadoMap[$est] ?? ['label' => $est, 'color' => '#666', 'bg' => '#eee'];
                            ?>
                            <p class="mb-4 text-primary-drivo"><strong>Estado:</strong>
                                <span style="background:<?= $info['bg'] ?>;color:<?= $info['color'] ?>;padding:3px 12px;border-radius:20px;font-size:.8rem;font-weight:600">
                                    <?= $info['label'] ?>
                                </span>
                            </p>
                            
                            <a href="#" class="btn btn-outline-drivo">Ver Detalles / Modificar</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-car-front text-muted icon-xl"></i>
                    <h4 class="mt-3 text-muted">No tienes reservas activas</h4>
                    <a href="coches.php" class="btn mt-3 btn-catalogo">Ver Catálogo</a>
                </div>
            <?php endif; ?>

            <h3 class="text-primary-drivo mb-4 fs-4 mt-5">Historial de reservas</h3>

            <?php if (!empty($anteriores)): ?>
                <div class="historial-list">
                    <?php foreach ($anteriores as $reserva): 
                        $vehiculo = $reserva->getVehiculo();
                        $estadoMapH = [
                                    'Pendiente'  => 'Pendiente',
                                    'Activa'     => 'Activa',
                                    'Finalizada' => 'Completada',
                                    'Cancelada'  => 'Cancelada',
                                ];
                        $textoEstado = $estadoMapH[$reserva->getEstado()] ?? $reserva->getEstado();
                    ?>
                        <div class="card-historial mb-3 w-75">
                            <div class="row g-0 align-items-center">
                                <div class="col-4 col-sm-3 text-center p-3">
                                    <img src="../View/img/coches/<?= pathinfo($vehiculo->getImagen(), PATHINFO_FILENAME) ?>--sin_fondo.png" alt="<?= $vehiculo->getNombreCompleto() ?>" class="img-fluid car-img-historial">
                                </div>
                                <div class="col-8 col-sm-9 p-3">
                                    <p class="mb-1 text-primary-drivo fs-6"><?= $vehiculo->getNombreCompleto() ?> - Ref: DRV<?= str_pad($reserva->getId(), 6, "0", STR_PAD_LEFT) ?></p>
                                    <p class="mb-0 text-primary-drivo fs-6">(<?= $textoEstado ?>)</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-muted">No tienes historial de reservas.</p>
            <?php endif; ?>

        </div>

    </main>

    <?php include '../View/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
