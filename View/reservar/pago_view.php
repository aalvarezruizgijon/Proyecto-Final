<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Pago Seguro</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <link rel="stylesheet" href="../View/css/pago.css">
    <link rel="shortcut icon" href="../View/img/logo.png" type="image/x-icon">

</head>
<body>
    <?php include '../View/header.php' ?>

    <main class="main__container pago-container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-0 card-pago">
                    
                    <!-- Resumen de la Reserva (Izquierda) -->
                    <div class="col-md-5 d-none d-md-block p-0">
                        <div class="resumen-reserva">
                            <h3 class="fw-bold mb-4 text-secondary-drivo">Resumen</h3>
                            
                            <img src="../View/img/coches/<?= pathinfo($coche->getImagen(), PATHINFO_FILENAME) ?>--sin_fondo.png" alt="<?= $coche->getNombreCompleto() ?>" class="resumen-img mb-4">
                            
                            <h4 class="mb-3"><?= $coche->getNombreCompleto() ?></h4>
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-white-50">Recogida</span>
                                <span><?= date('d/m/Y', strtotime($fecha_inicio)) ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="text-white-50">Devolución</span>
                                <span><?= date('d/m/Y', strtotime($fecha_fin)) ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-white-50">Días</span>
                                <span><?= $dias ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="text-white-50">Precio/Día</span>
                                <span><?= $coche->getPrecioDia() ?>€</span>
                            </div>
                            
                            <hr class="border-transparent">
                            
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fs-5 text-white-50">Total a Pagar</span>
                                <span class="fs-3 fw-bold text-secondary-drivo"><?= $precio_total ?>€</span>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario de Pago (Derecha) -->
                    <div class="col-md-7 p-5">
                        <h2 class="fw-bold mb-4 text-primary-drivo">Detalles de Pago</h2>
                        <p class="text-muted mb-4">Completa la información de tu tarjeta para confirmar la reserva de tu vehículo.</p>

                        <form action="../Controller/procesar_pago.php" method="POST" class="needs-validation" novalidate>
                            <!-- Datos ocultos para la BD -->
                            <input type="hidden" name="id_coche" value="<?= $coche->getId() ?>">
                            <input type="hidden" name="fecha_inicio" value="<?= $fecha_inicio ?>">
                            <input type="hidden" name="fecha_fin" value="<?= $fecha_fin ?>">
                            <input type="hidden" name="precio_total" value="<?= $precio_total ?>">

                            <div class="mb-4">
                                <label class="form-label fw-bold">Nombre en la tarjeta</label>
                                <div class="input-icon-wrapper">
                                    <i class="bi bi-person"></i>
                                    <input type="text" class="form-control input-drivo" placeholder="Ej. Fernando Ortiz" required>
                                    <div class="invalid-feedback">Por favor ingresa el nombre que aparece en la tarjeta.</div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Número de tarjeta</label>
                                <div class="input-icon-wrapper">
                                    <i class="bi bi-credit-card"></i>
                                    <input type="text" class="form-control input-drivo" placeholder="0000 0000 0000 0000" pattern="\d{16}" maxlength="16" required>
                                    <div class="invalid-feedback">Por favor ingresa un número de tarjeta válido de 16 dígitos.</div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label fw-bold">Fecha de Expiración</label>
                                    <div class="input-icon-wrapper">
                                        <i class="bi bi-calendar3"></i>
                                        <input type="text" class="form-control input-drivo" placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/?([0-9]{2})" maxlength="5" required>
                                        <div class="invalid-feedback">Formato inválido (MM/YY).</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold">CVV</label>
                                    <div class="input-icon-wrapper">
                                        <i class="bi bi-shield-lock"></i>
                                        <input type="password" class="form-control input-drivo" placeholder="123" pattern="\d{3,4}" maxlength="4" required>
                                        <div class="invalid-feedback">CVV inválido.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-4 text-muted small">
                                <i class="bi bi-lock-fill me-2 text-success"></i>
                                Pago seguro encriptado con SSL. Tus datos no serán almacenados.
                            </div>

                            <button type="submit" class="btn-pay">
                                Pagar <?= $precio_total ?>€ y Confirmar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <?php include '../View/footer.php' ?>

    <script>
        // Validación de Bootstrap
        (() => {
          'use strict'
          const forms = document.querySelectorAll('.needs-validation')
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }
              form.classList.add('was-validated')
            }, false)
          })
        })()
    </script>
</body>
</html>
