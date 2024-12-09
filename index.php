<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Library</title>
    <link rel="icon" type="image/x-icon" href="assets/icon/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
   
    
</head>

<body>
    <!-- Include Navbar -->
    <?php include 'components/navbar.html'; ?>

    <!-- Main Content -->
    <main>
        <?php include 'components/site.html'; ?>
        <?php include 'components/intro.html';?>
        <?php include 'components/card.html'; ?>
        <?php include 'components/contact-form.php'; ?>
    </main>

    <!-- Include Footer -->
    <?php include 'components/footer.html'; ?>
    <script src="js/main.js"></script>
</body>

</html>
