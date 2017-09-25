<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Trains - Home</title>
</head>
<body>
<header>
    <h1>Trains</h1>
</header>
<?php
foreach ($locomotives as $locomotive): ?>
    <article>
        <h2><?php echo $locomotive['serial'] . ' #' . $locomotive['id'] ?></h2>
        <p><?php echo $locomotive['resume'] ?></p>
    </article>
<?php endforeach ?>
<footer class="footer">
    manOfStorr
</body>
</html>