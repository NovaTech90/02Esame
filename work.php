<?php

include('./modules/head.php');
?>

<body>

    <?php
    include('./modules/nav.php');
    ?>

    <section id="work">
        <div class="container container-work">
        <?php
$json_data = file_get_contents("./files/projects.json");
$works = json_decode($json_data, true);
if ($works) {
    foreach ($works as $work) {
        if ($work['id'] ==$_GET['id']) {
?>
            <img src="<?php echo $work['image'] ?>" alt="" class="work-img">
            <div class="work-text">
                <h1><?php echo $work['name'] ?></h1>
                <h5><?php echo $work['subtitle'] ?></h5>
                <p><?php echo $work['description'] ?></p>
                <button type="button" class="btn"><a href="contact.php">Let's Talk</a></button>
            </div>
<?php
        }
    }
}
?>





        </div>
    </section>
    <?php
    include('./modules/footer.php');
    ?>
</body>