<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Modale</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary px-4 border-bottom shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LaTuaApp</a>
    <div class="d-flex ms-auto align-items-center">
      <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        Login
      </button>
    </div>
  </div>
</nav>

<!-- Spazio per compensare la navbar fixed -->
<div style="height: 70px;"></div>

<!-- Modale Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="login.php">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Accedi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Login</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

