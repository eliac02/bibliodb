<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Se l'utente non è loggato, reindirizza alla homepage
    header("Location: index.php");
    exit();
}

?>
<?php include 'header.php'; ?>

<div class="container-fluid">
  <div class="row">
    <!-- Colonna sinistra: Profilo -->
    <div class="col-md-3 bg-dark p-3 vh-100">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title"><?= $_SESSION['nome'] . " " . $_SESSION['cognome'] ?></h5>
          <p class="card-text">
            <strong>Email:</strong> <?= $_SESSION['email'] ?><br>
            <strong>Codice fiscale:</strong> <?= $_SESSION['codice_fiscale'] ?><br>
            <strong>Data di nascita:</strong> <?= $_SESSION['data_nascita'] ?><br>
            <strong>Età:</strong>
            <?php
              $today = new DateTime();
              $birthdate = new DateTime($_SESSION['data_nascita']);
              $age = $today->diff($birthdate)->y;
              echo $age . " anni";
            ?>
            <br>
            <!-- Se aggiungi "registrato_il" nel DB, puoi mostrarlo qui -->
          </p>
        </div>
      </div>
    </div>

    <!-- Colonna destra: Azioni -->
    <div class="col-md-9 d-flex align-items-center justify-content-center">
      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#passwordModal">
        Modifica Password
      </button>
    </div>
  </div>
</div>

<!-- Modale per modifica password -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="cambia_password.php" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordModalLabel">Modifica password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="old_password" class="form-label">Vecchia password</label>
          <input type="password" class="form-control" id="old_password" name="old_password" required>
        </div>
        <div class="mb-3">
          <label for="new_password" class="form-label">Nuova password</label>
          <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Conferma nuova password</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salva</button>
      </div>
    </form>
  </div>
</div>

<?php include 'footer.php'; ?>

