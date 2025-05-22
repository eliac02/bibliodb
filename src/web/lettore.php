<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Se l'utente non è loggato, reindirizza alla homepage
    header("Location: index.php");
    exit();
}

?>
<?php require 'header_user.php'; ?>

<div class="container-fluid">
  <div class="row">
    <!-- Colonna sinistra: Profilo -->
    <div class="col-md-3 bg-dark p-3 vh-100">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $_SESSION['nome'] . " " . $_SESSION['cognome'] ?>
          </h5>
          <p class="card-text">
            <strong>Email:</strong> <?php echo $_SESSION['email'] ?><br />
            <strong>Codice fiscale:</strong> <?php echo $_SESSION['codice_fiscale']
            ?><br />
            <strong>Data di nascita:</strong> <?php echo $_SESSION['data_nascita']
            ?><br />
            <strong>Età:</strong>
            <?php $today = new DateTime(); $birthdate = new
            DateTime($_SESSION['data_nascita']); $age =
            $today->diff($birthdate)->y; echo $age . " anni"; ?>
            <br />
            <strong>Data registrazione:</strong> <?php echo $SESSION['data_registrazione']?><br />
          </p>
        </div>
      </div>
    </div>

    <!-- Colonna destra: Azioni -->
    <div class="col-md-9">
      <!-- <div class="mt-5"> -->
      <!--   <h4>📚 Catalogo libri disponibili</h4> -->
      <!--   <div class="position-relative"> -->
      <!--     <!-- Contenitore scrollabile --> -->
      <!--     <div -->
      <!--       id="catalogo" -->
      <!--       class="d-flex overflow-auto border-rounded bg-dark" -->
      <!--       style="scroll-behavior: smooth" -->
      <!--     > -->
      <!--       <?php /* Esempio di 10 libri mock*/for ($i = 1; $i <= 10; $i++): ?> -->
      <!--       <div class="card me-3" style="min-width: 200px; max-width: 200px"> -->
      <!--         <img -->
      <!--           src="img/libro<?php echo $i ?>.jpg" -->
      <!--           class="card-img-top" -->
      <!--           alt="Libro <?php echo $i ?>" -->
      <!--         /> -->
      <!--         <div class="card-body"> -->
      <!--           <h5 class="card-title">Titolo <?php echo $i ?></h5> -->
      <!--           <p class="card-text text-muted">Autore <?php echo $i ?></p> -->
      <!--         </div> -->
      <!--       </div> -->
      <!--       <?php endfor; ?> -->
      <!--     </div> -->
      <!---->
      <!--     <!-- Pulsanti di scorrimento --> -->
      <!--     <button -->
      <!--       onclick="scrollCatalogo(-1)" -->
      <!--       class="btn btn-light position-absolute top-50 start-0 translate-middle-y shadow" -->
      <!--       style="opacity: 0.6" -->
      <!--     > -->
      <!--       ‹ -->
      <!--     </button> -->
      <!--     <button -->
      <!--       onclick="scrollCatalogo(1)" -->
      <!--       class="btn btn-light position-absolute top-50 end-0 translate-middle-y shadow" -->
      <!--       style="opacity: 0.6" -->
      <!--     > -->
      <!--       › -->
      <!--     </button> -->
      <!--   </div> -->
      <!-- </div> -->

      <button
        class="btn btn-warning"
        data-bs-toggle="modal"
        data-bs-target="#passwordModal"
      >
        Modifica Password
      </button>
    </div>
  </div>
</div>

<!-- Modale per modifica password -->
<div
  class="modal fade"
  id="passwordModal"
  tabindex="-1"
  aria-labelledby="passwordModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <form action="cambia_password.php" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="passwordModalLabel">Modifica password</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Chiudi"
        ></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="new_password" class="form-label">Nuova password</label>
          <input
            type="password"
            class="form-control"
            id="new_password"
            name="new_password"
            required
          />
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label"
            >Conferma nuova password</label
          >
          <input
            type="password"
            class="form-control"
            id="confirm_password"
            name="confirm_password"
            required
          />
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salva</button>
      </div>
    </form>
  </div>
</div>

<!-- <script> -->
<!--   function scrollCatalogo(direction) { -->
<!--     const container = document.getElementById("catalogo"); -->
<!--     const scrollAmount = 220; -->
<!--     container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' }); -->
<!--   } -->
<!-- </script> -->


<?php require 'footer.php'; ?>
