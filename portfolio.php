<?php
include('./modules/head.php');
?>

<body>

    <?php
    include('./modules/nav.php');
    ?>
    <section id="portfolio">
        <div class="container">
            <h1>Area Works</h1>
            <div class="main">
                <div class="cards-box">
                    <?php
                    $json_data = file_get_contents("./files/projects.json");
                    $projects = json_decode($json_data, true);
                    if (count($projects) != 0) {
                        foreach ($projects as $project) {
                        ?>
                            <div class="card">
                                <img src="<?php echo $project['image'] ?>" alt="">
                                <div class="overlay">
                                    <h3><?php echo $project['name'] ?></h3>
                                    <p><?php echo $project['description'] ?></p>
                                    <a href="work.php?id=<?php echo $project['id'] ?>" class="btn" title="Collegamento alla pagina dettagliata del lavoro">View More</a>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('./modules/footer.php');
    ?>
</body>