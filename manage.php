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
        if (!isset($_SESSION['loggedin'])) {
            header("Location: index.php");
        };
        include_once "header.inc";
        ColorHeader('manage');
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

            <form method="post" action="">
                <input type="text" name="search-string">
                <button type="submit">
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