function functionCategorie(){
    document.getElementById("sezioneCategoria").style.visibility = "visible"
}

function functionCategorieNo(){
    document.getElementById("sezioneCategoria").style.visibility = "hidden"
}


function loadXmlDOC(){

    var IdStagione;
    var selezione;

    var xhttp = new XMLHttpRequest();

    selezione = document.getElementById("selezione").value;

    if(selezione == ""){

    }else{
        IdStagione = selezione;

        xhttp.onreadystatechange = function() {
            
            if (this.readyState == 4 && this.status == 200) {

                episodi(this);

            }
        };

        xhttp.open("GET", "./serieXML.php?idStagione="+IdStagione);
        xhttp.send();
    }
            
    
    
}   

function episodi(xml) {
    
    var responseXML = xml.responseXML;
    var episodioXML = responseXML.getElementsByTagName('Episodio');

    var card = document.getElementById("card0");

    var episodi = document.getElementById("episodi");
    
    episodi.innerHTML = "";
   
    for (var i = 0; i< episodioXML.length; i++) {
        

        const clone = card.cloneNode(true);
        clone.setAttribute('id', 'card'+i);
        episodi.appendChild(clone)
       

        clone.getElementsByTagName("h5")[0].innerHTML = responseXML.getElementsByTagName("Titolo")[i].childNodes[0].nodeValue;
       
        clone.getElementsByTagName("h6")[0].innerHTML = responseXML.getElementsByTagName("Durata")[i].childNodes[0].nodeValue;
                
        clone.getElementsByTagName("p")[0].innerHTML = responseXML.getElementsByTagName("Descrizione")[i].childNodes[0].nodeValue;
    
        clone.getElementsByTagName("img")[0].src = responseXML.getElementsByTagName("Img")[i].childNodes[0].nodeValue;

    }

}

function like(idSerie) {
    
    var like = document.getElementById('like').style;

    if (like.fill == "red") {

        like.fill = "grey";

    }else{

        like.fill = "red";
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
            
        if (this.readyState == 4 && this.status == 200) {}
    }

    xhttp.open("GET", "inserimentoPreferiti.php?idSerie="+idSerie);
    xhttp.send();
}


var toastTrigger = document.getElementById('liveToastBtn')
var toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
   var toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
  })
}
