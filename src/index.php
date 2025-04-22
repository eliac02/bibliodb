<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Sistema Bibliotecario</span>
            <div class="menu">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaleLogin">
                    Login
                </button>
            </div>
        </div>
    </nav>

    <!-- contenuto principale -->
    <div class="container text-center">
        <h1 class="mt-5">Benvenuto nel sistema di biblioteche online</h1>
        <p class="lead">Accedi con il tuo account per gestire i tuoi prestiti o il sistema bibliotecario.</p>
    </div>

    <!-- login -->
    <div class="modal fade" id="modaleLogin" tabindex="-1" aria-labelledby="titoloModale" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <!-- form per login -->
          <form action="login.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="titoloModale">Accesso Utente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Accedi</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
