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
            
    IdStagione = selezione;

    xhttp.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {

            episodi(this);

        }
    };

    xhttp.open("GET", "./serieXML.php?idStagione="+IdStagione);
    xhttp.send();
    
}   

function episodi(xml) {
    
    var responseXML = xml.responseXML;
    var episodioXML = responseXML.getElementsByTagName('Episodio');

    var ContenitoreEpisodi = document.getElementById("ContenitoreEpisodi");
    var episodi = document.getElementById("episodi")
    const card = document.getElementById("card0");

    const episodiClonati = episodi.cloneNode(true);
    
    card.remove();
    
    episodiClonati.append(ContenitoreEpisodi);

    for (var i = 0; i< episodioXML.length; i++) {
        

        const clone = card.cloneNode(true);
        clone.setAttribute('id', 'card'+i);
        episodi.append(clone);

        clone.getElementsByTagName("h5")[0].innerHTML = responseXML.getElementsByTagName("Titolo")[i].childNodes[0].nodeValue;
       
        clone.getElementsByTagName("h6")[0].innerHTML = responseXML.getElementsByTagName("Durata")[i].childNodes[0].nodeValue;
                
        clone.getElementsByTagName("p")[0].innerHTML = responseXML.getElementsByTagName("Descrizione")[i].childNodes[0].nodeValue;
    
        clone.getElementsByTagName("img")[0].src = responseXML.getElementsByTagName("Img")[i].childNodes[0].nodeValue;

    }

}

