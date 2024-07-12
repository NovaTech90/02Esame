<?php

// Metodo per salvare i dati del form in un file TXT

if (isset($_POST['submit'])) {
    $name = "Username:" . $_POST['name'] . "
";
    $email = "Email:" . $_POST['email'] . "
";
    $email = "message:" . $_POST['message'] . "
";

    $file = fopen("data_form.txt", "a");
    fwrite($file, $name);
    fwrite($file, $email);
    fwrite($file, $message);
    fclose($file);
}

include('../modules/head.php');
?>

<body>

    <?php
    include('../modules/nav.php');
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
                <form action="" method="post">
                    <h2>Send Message</h2>
                    <div class="inputForm">
                        <input type="text" id="name" name="name" required>
                        <label>Your Name</label>
                    </div>
                    <div class="inputForm">
                        <input type="email" id="email" name="email" required>
                        <label>Your Email</label>
                    </div>
                    <div class="inputForm">
                        <textarea id="message" name="message" required></textarea>
                        <label>Message</label>
                    </div>
                    <div class="inputForm">
                        <input type="submit" name="submit" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    include('../modules/footer.php');
    ?>

</body>