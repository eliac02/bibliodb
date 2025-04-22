<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Se l'utente non è loggato, reindirizza alla homepage
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Profilo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2>Benvenuto nel tuo profilo!</h2>
        <p>Hai effettuato l'accesso con l'email: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>
    </div>

</body>
</html>

