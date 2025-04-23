<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <title>Biblioteca Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="style.css" rel="stylesheet" />
  </head>
  <body>
    <!-- navbar -->
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark fixed-top"
    >
      <div class="container-fluid">
        <!-- logo -->
        <a class="navbar-brand" href="#">
          <img
            src="../images/logo.png"
            alt="Logo"
            width="40"
            height="40"
            class="d-inline-block align-text-top rounded-circle"
          />
        </a>
        <span class="navbar-text mx-auto fw-bold">OpenBiblio</span>
        <!-- pulsanti -->
        <div class="d-flex">
          <button
            class="btn btn-outline-primary me-2"
            data-bs-toggle="modal"
            data-bs-target="#loginModal"
          >
            Accedi
          </button>
          <button
            class="btn btn-outline-success"
            data-bs-toggle="modal"
            data-bs-target="#registerModal"
          >
            Registrati
          </button>
        </div>
      </div>
    </nav>
    <!-- contenuto principale -->
    <div class="container text-center">
      <h1 class="mt-5">Benvenuto nel sistema di biblioteche Open Source</h1>
      <p class="lead">
        Registrati o Accedi per poter gestire i prestiti dalla tua area
        personale
      </p>
    </div>

    <!-- modale login -->
    <div
      class="modal fade"
      id="loginModal"
      tabindex="-1"
      aria-labelledby="loginModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form per login -->
          <form action="login.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="loginModalLabel">Accesso Utente</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Chiudi"
              ></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  id="email"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  id="password"
                  required
                />
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Accedi</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- modal register -->
    <div
      class="modal fade"
      id="registerModal"
      tabindex="-1"
      aria-labelledby="registerModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- form per registrarsi -->
          <form action="registrazione.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="registerModalLabel">
                Registrazione Utente
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Chiudi"
              ></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="codice_fiscale" class="form-label"
                  >Codice Fiscale:</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="codice_fiscale"
                  id="codice_fiscale"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="nome" class="form-label">Email:</label>
                <input
                  type="email_reg"
                  class="form-control"
                  name="email"
                  id="email_reg"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="password_reg" class="form-label">Password:</label>
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  id="password_reg"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input
                  type="text"
                  class="form-control"
                  name="nome"
                  id="nome"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="cognome" class="form-label">Cognome:</label>
                <input
                  type="text"
                  class="form-control"
                  name="cognome"
                  id="cognome"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="nascita" class="form-label">Data di nascita:</label>
                <input
                  type="date"
                  class="form-control"
                  name="data_nascita"
                  id="data_nascita"
                  required
                />
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Registrati</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php if (isset($_GET['login'])) : ?>
    <script>
      const loginModal = new bootstrap.Modal(
        document.getElementById("loginModal"),
      );
      loginModal.show();
    </script>
    <?php endif; ?>
  </body>
  <?php include 'footer.php'; ?>
</html>
