<?php require "components/header.php"; ?>
    <?php require "components/navbar.php"; ?>
    <h1>Emuārs</h1>
    <form method="get">
        <input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>' />
        <button>Meklēt</button>
    </form>
    <?php if (count($posts) == 0) { ?>
        <p>❌ Nav atrasts neviens ieraksts. 😭 Lūdzu, pamēģini citu vārdu vai frāzi 🐣</p>
    <?php } else { ?>
        <ul>
            <?php foreach ($posts as $post) { ?>
                <li> <?= $post["content"] ?> </li>
            <?php } ?>
        </ul>
    <?php } ?>
</body>

</html>