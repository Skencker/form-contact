<?php 



//initialisation des variables dans un tableau
$array = array (
  "firstname" => "",
  "name" => "",
  "email" => "",
  "phone" => "",
  "message" => "",
  "firstnameError" => "",
  "nameError" => "",
  "emailError" => "",
  "phoneError" => "",
  "messageError" => "",
  "messageMerci" => false
);
// $firstname = $name = $email = $phone = $message = "";
// $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
// $messageMerci = false;
$emailTo = "sandrinekencker@hotmail.com";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $array['firstname'] = $_POST["firstname"];
  $array['name'] = veryInput($_POST["name"]);
  $array['email'] = veryInput($_POST["email"]);
  $array['phone'] = veryInput($_POST["phone"]);
  $array['message'] = veryInput($_POST["message"]);
  $array ['messageMerci'] = true;
  $emailText = "";

  
  // verifier si il y a un firstname de facon plus sécurisé
  if (empty($array['firstname'])) {
    $array['firstnameError'] = "Je veux connaître ton prénom !";
    $array ['messageMerci'] = false;
  } else {
    $emailText .= "Firstmane :{$array['firstname']}\n" ;
  }
  
  // verifier si il y a un name de facon plus sécurisé
  if (empty( $array['name'])) {
    $array['nameError'] = "Je veux connaître ton nom !";
    $array ['messageMerci'] = false;
  } else {
    $emailText .= "Name :  {$array['name']}\n" ;
  }
  
  //verifier le mail avec la fonction
  if (!isEmail($array['email'])) {
    $array['emailError'] = "Ce n'est pas un email valide !";
    $array ['messageMerci'] = false;
  } else {
    $emailText .= "Email : {$array['email']}\n" ;
  }
  //verifier le phone avec la fonction
  if (!isPhone($array['phone'])) {
    $array['phoneError']= "Ce n'est pas un numero de téléphone valide !";
    $array ['messageMerci'] = false;
  } else {
    $emailText .= "Phone :  {$array['phone']}\n" ;
  }
  
  // verifier si il y a un message de facon plus sécurisé
  if (empty($array['message'])) {
    $array['messageError'] = "Qu'est ce que tu veux me dire ?";
    $array ['messageMerci'] = false;
  } else {
    $emailText .= "Message : {$array['message']}\n" ;
  }

  if ($array ['messageMerci']) {
    //envoi de l'email
    $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReplay-To: {$array['email']}";
    mail($emailTo, "Un message de votre site : " . $emailText , $headers );
    // $firstname = $name = $email = $phone = $message = "";
  }

  echo json_encode($array);
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