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
<body class="bg-dark">


    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title">Benvenuto nel tuo profilo!</h1>
                <p>Hai effettuato l'accesso con l'email: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>
                <p class="card-text">Qui potrai gestire le tue attività nella biblioteca.</p>
                <a href="index.php" class="btn btn-primary">Torna alla Home</a>
            </div>
        </div>
    </div>

</body>
</html>
