<!DOCTYPE html>
<html lang="pt-br" data-theme="dracula">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/output.css" rel="stylesheet">
    <title>LockBox</title>
</head>

<body>
    <section class="mx-auto max-w-screen-lg h-screen flex flex-col space-y-6">
        <?php require base_path('views/partials/_navbar.view.php'); ?>

        <?php require base_path('views/partials/_search.view.php'); ?>

        <?php require base_path('views/partials/_mensage.view.php'); ?>

        <div class="flex flex-grow pb-6">
            <?php require base_path("views/{$view}.view.php"); ?>
        </div>
    </section>
</body>

</html>