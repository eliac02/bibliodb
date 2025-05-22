<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica che l'utente sia loggato
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$cf = $_SESSION['codice_fiscale'];

// Connessione al database
$conn = pg_connect("host=localhost dbname=biblioteca user=elia password=elia");
if (!$conn) {
    die("Errore nella connessione al database.");
}

// Recupera le nuove password dal form
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Verifica che i campi non siano vuoti
if (empty($new_password) || empty($confirm_password)) {
    die("Entrambi i campi password sono obbligatori.");
}

// Verifica che le password coincidano
if ($new_password !== $confirm_password) {
    die("Le password non coincidono.");
}

// Prepara ed esegui la query di aggiornamento
pg_prepare($conn, "update_pwd", "UPDATE utente SET password = $1 WHERE codice_fiscale = $2");
$result = pg_execute($conn, "update_pwd", array($new_password, $cf));

if ($result) {
    echo "<div style='text-align:center; margin-top: 2rem;'>
            <h2>Password modificata con successo!</h2>
            <a href='index.php' class='btn btn-primary mt-3'>Accedi di nuovo</a>
          </div>";
} else {
    echo "Errore durante l'aggiornamento della password.";
}
?>

