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
            $json_data = file_get_contents("./files/works.json");
            $works = json_decode($json_data, true);
            if (count($works) != 0) {
                foreach ($works as $work) {
            ?>
                    <img src="./img/card.jpg" alt="" class="work-img">
                    <div class="work-text">
                        <h1><?php echo $work['title'] ?></h1>
                        <h5><?php echo $work['subtitle'] ?></h5>
                        <p><?php echo $work['description'] ?></p>
                        <button type="button" class="btn"><a href="">Let's Talk</a></button>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <?php
    include('./modules/footer.php');
    ?>
</body>