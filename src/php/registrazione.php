<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = pg_connect("host=localhost dbname=biblioteca user=elia password=elia");

if (!$conn) {
    die("Errore nella connessione al database.");
}

// Recupera i dati dal form
$codice_fiscale = $_POST['codice_fiscale'] ?? '';
$nome = $_POST['nome'] ?? '';
$cognome = $_POST['cognome'] ?? '';
$data_nascita = $_POST['data_nascita'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$data_registrazione = date("Y-m-d");

// Verifica che tutti i campi siano pieni
if (empty($codice_fiscale) || empty($email) || empty($password) || empty($nome) || empty($cognome) || empty($data_nascita)) {
    die("Compila tutti i campi.");
}

// Query di inserimento con l'ordine corretto
pg_prepare(
    $conn, "insert_utente", "
    INSERT INTO utente VALUES ($1, $2, $3, $4, $5, $6, $7)
"
);

// Esegui l'inserimento
$result1 = pg_execute(
    $conn, "insert_utente", array(
    $codice_fiscale, $nome, $cognome, $data_nascita, $email, $password, $data_registrazione
    )
);

if (!$result1) {
    die("Errore nell'inserimento in utente: " . pg_last_error($conn));
}

// Inserisce automaticamente in lettore
pg_prepare($conn, "insert_lettore", "INSERT INTO lettore VALUES ($1, $2, $3)");
$result2 = pg_execute($conn, "insert_lettore", array($codice_fiscale, '0', 'base'));

if (!$result2) {
    die("Errore nell'inserimento in lettore: " . pg_last_error($conn));
}

// Reindirizza alla pagina di ringraziamento
header("Location: grazie.php");
exit();
?>
