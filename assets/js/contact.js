function contact(){
    var nom= document.getElementById("nom").value;
    var prenom= document.getElementById("prenom").value;

    var email= document.getElementById("email").value;
    var tel= document.getElementById("tel").value;
    var msg= document.getElementById("msg").value;
    if (nom==""  && prenom=="" && email=="" && tel==""&& msg==""){
        alert("Veuillez remplir les champs");
        document.getElementById("identite","mgs").focus();
        return false;
    }
    else if (nom=="" || prenom=="" || (nom=="" && prenom=="")){
        alert("Veuillez saisir votre Nom et Prénom");
        document.getElementById("identite").focus();
        return false;
    }
    else if (!email.match(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/)){
        alert("Votre adresse mail n'est pas valide");
        document.getElementById("email").focus();
        // document.getElementById("mail").style.border="2px solid red";
        return false;
    }
    else if (tel=="" || (isNaN(tel))){
        alert("Veuillez saisir votre numéro de téléphone");
        document.getElementById("tel").focus();
        // document.getElementById("tel").style.border="2px solid red";
        return false;
    }
    else if (tel.length!=10){
        alert("Veuillez saisir les 10 chiffres de votre numéro de téléphone");
        document.getElementById("tel").focus();
        // document.getElementById("tel").style.border="2px solid red";
        return false;
    }
    return true;
}