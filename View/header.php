<header class="header__container">
    <a href="../Controller/index.php" class="logo__container">
        <img class="logo" src="../View/img/logo.png" alt="">
    </a>

    <div class="links__container">
        <nav class="nav">
            <a class="link" href="./index.php">Inicio</a>
            <a class="link" href="./coches.php">Ver coches</a>
            <a class="link" href="./reservas.php">Mis reservas</a>
            <a class="link" href="./contacto.php">Contactanos</a>
        </nav>
        <div class="icon--user">
            <?php if (isset($_SESSION['id_cliente'])): ?>
                <a href="./logout.php" title="Cerrar sesión" style="color: inherit; text-decoration: none;">
                    <i class="bi bi-box-arrow-right icon"></i>
                </a>
            <?php else: ?>
                <a href="./login.php" title="Iniciar sesión" style="color: inherit; text-decoration: none;">
                    <i class="bi bi-person-fill icon"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>