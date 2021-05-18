$(function() {
  $('#contact-form').submit(function(e) {
    e.preventDefault();
    $('.commentaire').empty();
    var postdata = $('#contact-form').serialize();

    $.ajax({
      type: 'POST',
      url : 'contact.php',
      data : postdata,
      dataType : 'json',
      success : function(result) {
        
        if(result.messageMerci) {
          $('#contact-form').append(" <p class='remerciement'> Votre message a bien été envoyé merci de m'avoir contacté :)</p>");
          $('#contact-form')[0].reset();
        } else {
          $('#firstname + .commentaire').html(result.firstnameError);
          $('#name + .commentaire').html(result.nameError);
          $('#email + .commentaire').html(result.emailError);
          $('#phone + .commentaire').html(result.phoneError);
          $('#message + .commentaire').html(result.messageError);
        }
      }
    });
  });
});