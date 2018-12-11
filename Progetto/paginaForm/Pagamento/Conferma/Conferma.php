<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Confirm Payment</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>

  <body class="text-center" background="download.jpg">
      <?php
        session_start();
        if(!(isset($_POST['Check']))) {
            header("Location: ../../../Nuova HomePage/index.html");
        }
        else {
          $nome_mittente = "Proietti Monti";
          $mail_mittente = "lorenzoproietti16@gmail.com";
          $mail_destinatario = $_POST['email'];
          $mail_oggetto = "Payment Summary";
          $mail_corpo = "DEPARTURE PLANE CODE: " . $_SESSION['codiceAereoPartenza'] . "\r\nDEPARTURE AIRLINE: " . $_SESSION['compagniaPartenza'] . "\r\nDEPARTURE CITY: " . $_SESSION['cittàPartenza1'] . "\r\nARRIVAL CITY: " . $_SESSION['cittàArrivo1'] . "\r\nDEPARTURE DATE: " . $_SESSION['partenza1'] . "\r\nARRIVAL DATE: " . $_SESSION['arrivo1'] . "\r\nPRICE: " . $_SESSION['prezzo1'] . "\r\nRETURN PLANE CODE: " . $_SESSION['codiceAereoRitorno'] . "\r\nRETURN AIRLINE: " . $_SESSION['compagniaRitorno'] . "\r\nDEPARTURE CITY: " . $_SESSION['cittàPartenza2'] . "\r\nARRIVAL CITY: " . $_SESSION['cittàArrivo2'] . "\r\nDEPARTURE DATE: " . $_SESSION['partenza2'] . "\r\nARRIVAL DATE: " . $_SESSION['arrivo2'] . "\r\nPRICE: " . $_SESSION['prezzo2']; 
          $mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
          $mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
          $mail_headers .= "X-Mailer: PHP/" . phpversion();
          if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers))
            echo "Messaggio inviato con successo a " . $mail_destinatario;
          else
            echo "Errore. Nessun messaggio inviato.";
          $_SESSION = array();
          session_destroy();
        }
        ?>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Payment Executed</h1>
        <p class="lead">The payment was successful, an email was sent to the address entered for the summary</p>
        <p class="lead">
          <a href="../../../Nuova HomePage/index.html" class="btn btn-lg btn-secondary">Back to HomePage</a>
        </p>
      </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
