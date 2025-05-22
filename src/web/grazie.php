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

    <?php include "navbar.php"; ?> 

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
        // effetto visivo di coriandoli
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
