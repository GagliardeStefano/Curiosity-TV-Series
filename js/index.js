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

    console.log(IdStagione);


    xhttp.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {

            episodi(this);

        }
    };
    
    console.log("ID PRIMA: "+IdStagione)


    xhttp.open("GET", "./serieXML.php?idStagione="+IdStagione);
    xhttp.send();
    
    console.log("ID DOPO: "+IdStagione)
}   

function episodi(xml) {
    
    var responseXML = xml.responseXML;
    var episodioXML = responseXML.getElementsByTagName('Episodio');
            
    const card = document.getElementById("card");

    var SezioneEpisodi = document.getElementById("episodi");

    for (var i = 0; i< episodioXML.length; i++) {
        
        const clone = card.cloneNode(true);
        clone.setAttribute('id', 'card'+i);

        SezioneEpisodi.append(clone);

        clone.getElementsByTagName("h5")[0].innerHTML = responseXML.getElementsByTagName("Titolo")[i].childNodes[0].nodeValue;
       
        clone.getElementsByTagName("h6")[0].innerHTML = responseXML.getElementsByTagName("Durata")[i].childNodes[0].nodeValue;
                
        clone.getElementsByTagName("p")[0].innerHTML = responseXML.getElementsByTagName("Descrizione")[i].childNodes[0].nodeValue;
    
        clone.getElementsByTagName("img")[0].src = responseXML.getElementsByTagName("Img")[i].childNodes[0].nodeValue;

    }

}

