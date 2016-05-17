// Fonction servant à récupérer les informations de connexion de la page authentification.php
function connexion() {
  var usermail = document.getElementById('usermail').value;
  var password = document.getElementById('password').value;

  window.location.replace("connexion.php?usermail="+usermail+"&password="+password);
}

// Fonction servant à limiter le nombre de caractère dans une textarea
function MaxLengthTextArea(element,max){
 if (element.value.length > max) {
   element.value = element.value.substring(0, max);
   alert('Votre texte ne doit pas dépasser '+max+' caractères !');
  }
}

// Fonction de redirection vers l'index sur l'action clique sur un bouton
function redirectionIndex() {
  window.location.href = 'index.php';
}

// fonction pour vérifier si une adresse email est tapé correctement dans le champ
function verifMail(champ) {
  var reg = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

     if(reg.test(champ))
    {
      alert('L\'adresse email rentrée est valide !');
      return(true);
    }
    else if
    {
      alert('L\'adresse email rentrée n\'est pas valide !');
      return(false);
    }
}

// fonction pour comparer deux mots de passe entrés
function validation(f) {
  if (f.motdepasse_1.value == '' || f.motdepasse_2.value == '') {
    alert('Tous les champs ne sont pas remplis');
    f.motdepasse_1.focus();
    return false;
    }
  else if (f.motdepasse_1.value != f.motdepasse_2.value) {
    alert('Ce ne sont pas les mêmes mots de passe!');
    f.motdepasse_1.focus();
    return false;
    }
  else if (f.motdepasse_1.value == f.motdepasse_2.value) {
    return true;
    }
  else {
    f.motdepasse_1.focus();
    return false;
    }
  }
