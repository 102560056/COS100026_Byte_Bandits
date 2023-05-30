<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Managment</title>
</head>
<body>
    <?php
        session_start();
        include_once "header.inc";
        ColorHeader('management');
    ?>

    <main class="manage-main">
        <p>Delete All Job Refrences</p>
        <section class="manage-search-bars">
            <form method="post">
                <input type="text" name="delete-all">
                <button type="submit">
                    <img src="images/trash.svg" alt="">
                </button>
            </form>

            <form action="">
                <input type="text">
                <button type="submit" name="search">
                    <img src="images/search.svg" alt="">
                </button>
            </form>
        </section>
        <?php
            include_once "manage-table.inc";
        ?>
    </main>
</body>
</html>