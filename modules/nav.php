<?php $activePage = basename($_SERVER['REQUEST_URI']); ?>
<header>
    <nav class="hamburger-menu">
        <img src="../img/logo.png" alt="" class="logo">
        <input type="checkbox" id="controllo">
        <label for="controllo" class="label-controllo"><span></span></label>
        <ul id="menu">
            <li><a class="vociMenu" href="../pages/index.php" <?php if ($activePage === "index.php") { ?> class="activeLink" <?php } ?>>Home</a></li>
            <li><a class="vociMenu" href="../pages/about.php" <?php if ($activePage === "about.php") { ?> class="activeLink" <?php } ?>>About Me</a></li>
            <li><a class="vociMenu" href="../pages/portfolio.php" <?php if ($activePage === "portfolio.php") { ?> class="activeLink" <?php } ?>>Portfolio</a></li>
            <li><a href="../pages/contact_datatxt.php" class="btnCTA">Contact Me</a></li>
        </ul>
    </nav>
</header>