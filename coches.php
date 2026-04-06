<?php 
require_once 'conexion.php'; 

// Consultamos todos los coches de la tabla
$stmt = $pdo->query("SELECT * FROM coches");
$coches = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivo | Ver Coches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
</head>
<body>
    <header class="header__container">
        <div class="logo__container">
            <img class="logo" src="./img/logo.png" alt="Drivo">
        </div>

        <div class="links__container">
            <nav class="nav">
                <a class="link" href="./index.php">Inicio</a>
                <a class="link active" href="./coches.php">Ver coches</a>
                <a class="link" href="./reservas.php">Mis reservas</a>
                <a class="link" href="./contacto.php">Contactanos</a>
            </nav>
            <div class="icon--user">
                <i class="bi bi-person-fill icon"></i>
            </div>
        </div>
    </header>

    <main class="main__container">
        <h1 class="title">NUESTROS COCHES</h1>
        
        <div class="ofertas__flex">
            <?php 
            foreach ($coches as $coche) { 
            ?>
                <div class="oferta">
                    <h3 class="modelo"><?php echo $coche['modelo']; ?></h3>
                    
                    <div class="photo__container">
                        <img class="photo" src="./img/coches/<?php echo $coche['imagen']; ?>" alt="<?php echo $coche['modelo']; ?>">
                    </div>

                    <div class="info__container">
                        <p><i class="bi bi-gear"></i> <?php echo $coche['traccion']; ?></p>
                        <p><i class="bi bi-life-preserver"></i> Monta llantas de <?php echo $coche['llantas']; ?></p>
                        <p><i class="bi bi-engine-fill"></i> Motor <?php echo $coche['motor']; ?></p>
                        <p><i class="bi bi-command"></i> <?php echo $coche['cambio']; ?></p>
                        <p><i class="bi bi-calendar-event"></i> Año <?php echo $coche['anio']; ?></p>
                    </div>

                    <div class="reservar__container">
                        <div class="price__section">
                            <span class="price-label">PRECIO:</span>
                            <span class="price-value"><?php echo $coche['precio']; ?>€/día</span>
                        </div>
                        <a href="reservar.php?id=<?php echo $coche['id']; ?>" class="btn__reservar">RESERVAR AHORA</a>
                    </div>
                </div>
            <?php 
            } 
            ?>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer__container">
        <div class="footer__content">
            <div class="footer__column">
                <h3>SOBRE NOSOTROS</h3>
                <p>En Drivo, eliminamos la burocracia y la letra pequeña. Combinamos tecnología ágil con un trato humano excepcional para que tu única preocupación sea disfrutar de la carretera.</p>
                <p>Ofrecemos una flota premium, precios transparentes sin sorpresas y un compromiso total contigo.</p>
                <p class="slogan">Nuestro Equipo, Tu Viaje.</p>
            </div>

            <div class="footer__column">
                <h3>ENLACES</h3>
                <ul class="footer__links">
                    <li><a href="#">· Pagina Principal</a></li>
                    <li><a href="#">· Ver ofertas</a></li>
                    <li><a href="#">· Ver coches</a></li>
                    <li><a href="#">· Mis reservas</a></li>
                    <li><a href="#">· Contactanos</a></li>
                </ul>
            </div>

            <div class="footer__column">
                <h3>DONDE ENCONTRARNOS</h3>
                <div class="map__container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3175.7607730925!2d-5.7833!3d37.1833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDExJzAwLjAiTiA1wrA0NycwMC4wIlc!5e0!3m2!1ses!2ses!4v1700000000000" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <div class="footer__bottom">
            <p>Derechos de autor a Drivo© 2025</p>
        </div>
    </footer>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>