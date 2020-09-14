<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "Page sans titre" ?></title>
</head>

<body>
    <?php include VIEW_PATH . $page . ".php" ?>
</body>

</html>