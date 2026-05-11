<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Contáctanos</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../View/css/style.css">
    <style>
        .btn-full {
            width: 100%;
            border: none;
            background-color: #fff;
            color: #152D51;
            font-weight: bold;
            padding: 12px;
            border-radius: 0.8rem;
            transition: background 0.3s;
        }

        .btn-full:hover {
            background-color: #7BD5AB;
            /* Color secundario de Drivo */
        }

        .contacto-container {
            padding-top: 4rem;
            padding-bottom: 8rem;
            padding-left: 15px;
            padding-right: 15px;
        }

        @media (min-width: 992px) {
            .contacto-container {
                padding-top: 5rem;
                padding-left: 0;
                padding-right: 0;
            }
        }

        .info-box i {
            font-size: 1.5rem;
            color: #7BD5AB;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <?php include '../View/header.php' ?>

    <main class="main__container contacto-container">
        <div class="row g-5">
            <!-- Columna Izquierda: Información de contacto -->
            <div class="col-lg-5">
                <h1 class="fw-bold mb-4" style="color: #152D51;">¿Hablamos?</h1>
                <p class="mb-5 text-muted">Estamos aquí para ayudarte a que tu viaje sea perfecto. Si tienes dudas sobre nuestras tarifas o vehículos, no dudes en escribirnos.</p>

                <div class="info-box d-flex align-items-start mb-4">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div>
                        <h5 class="fw-bold mb-1" style="color: #152D51;">Nuestra Sede</h5>
                        <p>P.º de Consolación, 1, 41710 Utrera, Sevilla, España</p>
                    </div>
                </div>

                <div class="info-box d-flex align-items-start mb-4">
                    <i class="bi bi-telephone-fill"></i>
                    <div>
                        <h5 class="fw-bold mb-1" style="color: #152D51;">Teléfono</h5>
                        <p>+34 123 123 123</p>
                    </div>
                </div>

                <div class="info-box d-flex align-items-start">
                    <i class="bi bi-envelope-at-fill"></i>
                    <div>
                        <h5 class="fw-bold mb-1" style="color: #152D51;">Correo Electrónico</h5>
                        <p>info@drivo.es</p>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Formulario -->
            <div class="col-lg-7">
                <div class="oferta p-4 w-100 mt-5 mt-lg-0" style="position: relative;">
                    <h2 class="modelo" style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); width: auto; height: 30px; padding: 0 20px; white-space: nowrap;">
                        MENSAJE
                    </h2>

                    <form action="" method="POST" class="mt-4 pt-3 needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nombre</label>
                                <input type="text" name="nombre" class="form-control" style="border-radius: 0.8rem;" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Asunto</label>
                                <input type="text" name="asunto" class="form-control" style="border-radius: 0.8rem;" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" style="border-radius: 0.8rem;" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Tu mensaje</label>
                            <textarea name="mensaje" class="form-control" rows="4" style="border-radius: 0.8rem;" required></textarea>
                        </div>

                        <div class="reservar__container" style="margin: 0; padding: 5px;">
                            <button type="submit" class="btn-full">
                                ENVIAR CONSULTA
                            </button>
                        </div>
                    </form>
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