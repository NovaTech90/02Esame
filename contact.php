<?php
ini_set("auto_detect_line_endings", true);
require_once('funzioni.php');

use MieClassi\Funzioni  as Funzioni;

$inviato = Funzioni::richiestaHTTP("inviato");
$inviato = ($inviato == null || $inviato != 1) ? false : true;

if ($inviato) {
    $valido = 0;

    $nome = Funzioni::richiestaHTTP("nome");
    $email = Funzioni::richiestaHTTP("email");
    $messaggio = Funzioni::richiestaHTTP("messaggio");

    $errore = ' class="errore"';

    if (($nome != "")) {
        $erroreNome = "";
    } else {
        $valido++;
        $erroreNome = $errore;
        $nome = "";
    }

    if (($email != "") && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroreEmail = "";
    } else {
        $valido++;
        $erroreEmail = $errore;
        $email = "";
    }

    if (($messaggio != "")) {
        $erroreMessaggio = "";
    } else {
        $valido++;
        $erroreMessaggio = $errore;
        $messaggio = "";
    }

    $inviato = ($valido == 0) ? true : false;
} else {
    $nome = "";
    $email = "";
    $messaggio = "";

    $erroreNome = "";
    $erroreEmail = "";
    $erroreMessaggio = "";
}

include('./modules/head.php');
?>

<body>

    <?php
    include('./modules/nav.php');
    ?>
    <section id="contact">
        <div class="contactContent">
            <h1>Contact Me</h1>
        </div>
        <div class="container container-contact">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Indirizzo</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>Numero Telefono</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>Indirizzo Email</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <?php
                if (!$inviato) {
                ?>
                    <form action="contact.php?inviato=1" method="post" autocomplete="no" novalidate>
                        <h2>Send Message</h2>

                        <div class="input-form">
                            <label for="nome" <?php echo $erroreNome; ?>>Nome</label>
                            <input type="text" id="nome" name="nome" required value="<?php echo $nome; ?>">
                        </div>
                        <div class="input-form">
                            <label for="email" <?php echo $erroreEmail; ?>>Email</label>
                            <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
                        </div>
                        <div class="input-form">
                            <label for="messaggio" <?php echo $erroreMessaggio; ?>>Messaggio</label>
                            <textarea name="messaggio" id="messaggio" required><?php echo $messaggio; ?></textarea>
                        </div>
                        <button type="submit">Send</button>
                    </form>
                <?php
                } else {

                    $nome = Funzioni::richiestaHTTP("nome");
                    $email = Funzioni::richiestaHTTP("email");
                    $messaggio = Funzioni::richiestaHTTP("messaggio");

                    $file = fopen("./files/data_form.txt", "a");

                    fwrite($file, "nome: ");
                    fwrite($file, $nome . "\n");
                    fwrite($file, "email: ");
                    fwrite($file, $email . "\n");
                    fwrite($file, "messaggio: ");
                    fwrite($file, $messaggio . "\n");
                    fclose($file);

                    echo '<p class="success;" style="color: teal; font-size: 16px; letter-spacing: 1px; font-weight: 600;">Grazie per avermi contattato</p>';
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    include('./modules/footer.php');
    ?>

</body>