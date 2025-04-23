<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <title>Grazie per la Registrazione</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
  </head>
  <body class="d-flex flex-column min-vh-100">

    <!-- navbar -->
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark fixed-top"
    >
      <div class="container-fluid">
        <!-- logo -->
        <a class="navbar-brand" href="index.php">
          <img
            src="../images/logo.png"
            alt="Logo"
            width="40"
            height="40"
            class="d-inline-block align-text-top rounded-circle"
          />
        </a>
        <span class="navbar-text mx-auto fw-bold">OpenBiblio</span>
                </nav>

    <main class="flex-grow-1 d-flex justify-content-center align-items-center">
      <div class="text-center">
        <h1 class="mb-4">🎉 Grazie per esserti registrato!</h1>
        <p class="lead">
          Benvenuto su <strong>OpenBiblio</strong>. Ora puoi accedere al
          sistema.
        </p>
        <a href="index.php" class="btn btn-primary mt-4">Accedi</a>
      </div>
    </main>
    <script>
      const jsConfetti = new JSConfetti({
        canvas: document.getElementById("confetti-canvas"),
      });
      jsConfetti.addConfetti({
        confettiColors: [
          "#ff0a54",
          "#ff477e",
          "#ff7096",
          "#ff85a1",
          "#fbb1bd",
          "#f9bec7",
        ],
        confettiNumber: 200,
      });
    </script>

<?php include "footer.php"; ?>
  </body>
</html>
