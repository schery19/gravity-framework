<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= IMAGES.'apple-icon.png'?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= IMAGES.'favicon.ico' ?>">

    <link rel="stylesheet" type="text/css" href="<?= STYLES.'bootstrap.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= STYLES.'custom.css' ?>">

</head>

<body>


    
    <div class="container-fluid">
    	<?= $content ?>
    </div>

    

    <!-- Start Script -->
    
    <script src="<?= JS.'jquery-1.11.0.min.js' ?>"></script>
    <script src="<?= JS.'bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= JS.'custom.js' ?>"></script>

    <!-- End Script -->
</body>

</html>