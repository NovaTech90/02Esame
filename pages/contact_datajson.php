<?php

//Metodo per salvare i dati del form in un JSON file
require('../form/form.php');
$response = null;
if (isset($_POST['submit'])) {
    $response = storeMessage($_POST['name'], $_POST['email'], $_POST['message']);
    if ($response == "success") {
        unset($_POST);
    }
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
                <form action="" method="post"> <!-- Form funzionante che salva i messaggi in un file JSON -->
                    <h2>Send Message</h2>
                    <div class="inputForm">
                        <input type="text" id="name" name="name" value="<?php echo @$_POST['name'] ?>" required>
                        <label>Your Name</label>
                    </div>
                    <div class="inputForm">
                        <input type="email" id="email" name="email" value="<?php echo @$_POST['email'] ?>" required>
                        <label>Your Email</label>
                    </div>
                    <div class="inputForm">
                        <textarea id="message" name="message" required><?php echo @$_POST['message'] ?></textarea>
                        <label>Message</label>
                    </div>
                    <div class="inputForm">
                        <input type="submit" name="submit" value="Send">
                    </div>

                    <?php
                    if ($response == "success") {
                    ?>
                        <p class="success">Message is stored succefully</p>
                    <?php
                    } else {
                    ?>
                        <p class="error"><?php echo $response ?></p>
                    <?php
                    }
                    ?>



                </form>
            </div>
        </div>
    </section>
    <?php
    include('../modules/footer.php');
    ?>

</body>