var mot = document.getElementById("mail");
var texteComparaison = "";

mail.addEventListener("input", function(e){
 
    var regexCourriel = /.+@.+\..+/;
    var validiteCourriel = "";
    if (!regexCourriel.test(e.target.value)){
        mot.style.color = "red";
        
    }
else{
     mot.style.color = "green";
     
 }   
})