<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.gc_maxlifetime', 3600); // durata sessione 1 ora

session_start();

// Connessione al database
$conn = pg_connect("host=localhost dbname=biblioteca user=elia password=elia");

if (!$conn) {
    die("Errore nella connessione al database.");
}

// Recupero dati dal form
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Verifica che i campi non siano vuoti
if (empty($email) || empty($password)) {
    die("Per favore, inserisci email e password.");
}

// Prepara lo statement (solo la prima volta, il DB lo memorizza in cache)
pg_prepare($conn, "login_query", "SELECT * FROM utente WHERE email = $1 AND password = $2");

// Esegui lo statement con i dati dell'utente
$result = pg_execute($conn, "login_query", array($email, $password));

// Verifica se l'utente esiste
if (pg_num_rows($result) === 1) {
    $user = pg_fetch_assoc($result);

    // Salva i dati dell'utente in sessione
    $_SESSION['email'] = $user['email'];
    $_SESSION['nome'] = $user['nome'];
    $_SESSION['cognome'] = $user['cognome'];
    $_SESSION['codice_fiscale'] = $user['codice_fiscale'];
    $_SESSION['data_nascita'] = $user['data_nascita'];
    $_SESSION['data_registrazione'] = $user['data_registrazione'];

    $cf = $user['codice_fiscale'];

    // Verifica se è un lettore
    $res_lettore = pg_query($conn, "SELECT 1 FROM lettore WHERE codice_fiscale = '$cf'");
    if (pg_fetch_row($res_lettore)) {
        header("Location: lettore.php");
    } else {
        header("Location: bibliotecario.php");
    }

    exit();
} else {
    echo "Credenziali errate. <a href='index.php'>Torna indietro</a>";
}
?>
