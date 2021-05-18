<?php 

//initialisation des variable
$firstname = $name = $email = $phone = $message = "";
$firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
$messageMerci = false;
$emailTo = "sandrinekencker@hotmail.com";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST["firstname"];
  $name = veryInput($_POST["name"]);
  $email = veryInput($_POST["email"]);
  $phone = veryInput($_POST["phone"]);
  $message = veryInput($_POST["message"]);
  $messageMerci = true;
  $emailText = "";

  
  // verifier si il y a un firstname de facon plus sécurisé
  if (empty($firstname)) {
    $firstnameError = "Je veux connaître ton prénom !";
    $messageMerci = false;
  } else {
    $emailText .= "Firstmane : $firstname\n" ;
  }
  
  // verifier si il y a un name de facon plus sécurisé
  if (empty($name)) {
    $nameError = "Je veux connaître ton nom !";
    $messageMerci = false;
  } else {
    $emailText .= "Name : $firstname\n" ;
  }
  
  //verifier le mail avec la fonction
  if (!isEmail($email)) {
    $emailError = "Ce n'est pas un email valide !";
    $messageMerci = false;
  } else {
    $emailText .= "Email : $email\n" ;
  }
  //verifier le phone avec la fonction
  if (!isPhone($phone)) {
    $phoneError = "Ce n'est pas un numero de téléphone valide !";
    $messageMerci = false;
  } else {
    $emailText .= "Phone : $phone\n" ;
  }
  
  // verifier si il y a un message de facon plus sécurisé
  if (empty($message)) {
    $messageError = "Qu'est ce que tu veux me dire ?";
    $messageMerci = false;
  } else {
    $emailText .= "Message : $message\n" ;
  }

  if ($messageMerci) {
    //envoi de l'email
    $headers = "From: $firstname $name <$email>\r\nReplay-To: $email";
    mail($emailTo, "Un message de votre site : " . $emailText , $headers );
    $firstname = $name = $email = $phone = $message = "";
  }
}


//verifier si c'est un numero de tel
function isPhone ($var) {
  return preg_match("/^[0-9 ]*$/", $var); //demande un chiffre entre 0 et 9 permet un espace = fonction regulière
}


//verifier le mail renvoi true si c'est valide 
function isEmail($var) {
  return filter_var($var, FILTER_VALIDATE_EMAIL);
}

//fonction pour verifier l'input 
function veryInput ($var) {
  $var = trim($var); //enlever espace etc....
  $var = stripslashes($var); //enlever les \
  $var = htmlspecialchars($var); //enlever le code html etc
  return $var;
};

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Bootstrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />

    <!--Font google-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato&display=swap"
      rel="stylesheet"
    />

    <!--feuille css-->
    <link rel="stylesheet" href="style.css" />

    <title>Contactez-moi!</title>

  </head>
  <body>

    <div class="container">
      <div class="separateur"></div>
      <div class="titre">
        <h2>Contactez-moi</h2>
      </div>
      <div class="row">
        <div class="col-lg-10 col-offset-1"></div>
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" id= "contact-form" method="post" role="form">
          <div class="row">
            <div class="col-md-6">
              <label for="firstname">Prénom <span class="orange">*</span></label>
              <input type="text" name = "firstname" id="firstname" class='form-control' placeholder="Votre prénom" value = "<?php  echo $firstname;?>"  >
              <p class='commentaire'><?php echo $firstnameError;?></p>
            </div>
            <div class="col-md-6">
              <label for="name">Nom <span class="orange">*</span></label>
              <input type="text" name = "name" class='form-control' placeholder="Votre nom" value = "<?php  echo $name;?>">
              <p class='commentaire'><?php echo $nameError;?></p>
            </div>
            <div class="col-md-6">
              <label for="email">Email <span class="orange">*</span></label>
              <input type="email" name = "email" class='form-control' placeholder="Votre email" value = "<?php  echo $email;?>" >
              <p class='commentaire'><?php echo $emailError;?></p>
            </div>
            <div class="col-md-6">
              <label for="phone">Téléphone </label>
              <input type="tel" name = "phone" class='form-control' placeholder="Votre téléphone" value = "<?php  echo $phone;?>">
              <p class='commentaire'><?php echo $phoneError;?></p>
            </div>
            <div class="col-md-12">
              <label for="message">Message <span class="orange">*</span></label>
              <textarea name="message" id="message" rows="4" class="form-control" > <?php  echo $message;?></textarea>
              <p class='commentaire'><?php echo $messageError;?></p>
            </div>
            <div class="col-md-12">
              <p class='orange'>* Ces informations sont requises</p>
            </div>
            <div class="col-md-12">
             <input type="submit" class="button" value="Envoyer">
            </div>
          </div>

          <p class="remerciement" style = "display:<?php echo $messageMerci ? "block" : "none";?>" > Votre message a bien été envoyé merci de m'avoir contacté :)</p>
        </form>
      </div>
    </div>



  </body>
  <!--Bootstrap-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"
  ></script>
</html>