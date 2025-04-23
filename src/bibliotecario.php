<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Se l'utente non è loggato, reindirizza alla homepage
    header("Location: index.php");
    exit();
}

?>

<?php include 'header.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title">Benvenuto nella tua admin console!</h1>
                <p>Hai effettuato l'accesso con l'email: <strong><?php echo htmlspecialchars($_SESSION['email']); ?></strong></p>
                <p class="card-text">Qui potrai gestire le tue attività nella biblioteca.</p>
                <a href="index.php" class="btn btn-primary">Torna alla Home</a>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>
