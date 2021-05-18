

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
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
        <form action="" id= "contact-form" method="post" role="form">
          <div class="row">
            <div class="col-md-6">
              <label for="firstname">Prénom <span class="orange">*</span></label>
              <input type="text" name = "firstname" id="firstname" class='form-control' placeholder="Votre prénom" value = ""  >
              <p class='commentaire'></p>
            </div>
            <div class="col-md-6">
              <label for="name">Nom <span class="orange">*</span></label>
              <input type="text" name = "name" id="name" class='form-control' placeholder="Votre nom" value = "">
              <p class='commentaire'></p>
            </div>
            <div class="col-md-6">
              <label for="email">Email <span class="orange">*</span></label>
              <input type="email" name = "email" id="email" class='form-control' placeholder="Votre email" value = "" >
              <p class='commentaire'></p>
            </div>
            <div class="col-md-6">
              <label for="phone">Téléphone </label>
              <input type="tel" name = "phone" id="phone" class='form-control' placeholder="Votre téléphone" value = "">
              <p class='commentaire'></p>
            </div>
            <div class="col-md-12">
              <label for="message">Message <span class="orange">*</span></label>
              <textarea name="message" id="message" rows="4" class="form-control" ></textarea>
              <p class='commentaire'></p>
            </div>
            <div class="col-md-12">
              <p class='orange'>* Ces informations sont requises</p>
            </div>
            <div class="col-md-12">
             <input type="submit" class="button" value="Envoyer">
            </div>
          </div>

    
        </form>
      </div>
    </div>



  </body>
      <!--script-->
      <script src="script.js"></script>
  <!--Bootstrap-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"
  ></script>
</html>