function functionCategorie(){
    document.getElementById("sezioneCategoria").style.visibility = "visible"
}

function functionCategorieNo(){
    document.getElementById("sezioneCategoria").style.visibility = "hidden"
}

function loadXmlDOC(){

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
            episodi(this);
        }
    };

    xhttp.open("GET", "./serieXML.php?idStagione=1", true);
    xhttp.send();
    
}   

function episodi(xml) {
    
    var idStagione = document.getElementById("idStagione");
    console.log("IdStagione: "+idStagione);

    var responseXML = xml.responseXML;
    console.log(responseXML);        

    var episodio = responseXML.getElementsByTagName('Episodio');
    console.log(episodio)
            
        
    for (var i = 0; i< episodio.length; i++) {

        const card = document.getElementById("card");
        const clone = card.cloneNode(true);
        
        clone.setAttribute('id', 'card'+i);

        document.getElementById("episodi").append(clone);
       
        var Titolo = (clone.getElementsByTagName("h5").innerHTML = responseXML.getElementsByTagName("Titolo")[i].childNodes[0].nodeValue);
        console.log(Titolo);

        var Durata = (clone.getElementsByTagName("h6").innerHTML = responseXML.getElementsByTagName("Durata")[i].childNodes[0].nodeValue);
        console.log(Durata);
                
        var Desc = (clone.getElementsByTagName("p").innerHTML = responseXML.getElementsByTagName("Descrizione")[i].childNodes[0].nodeValue);
        console.log(Desc);

        var img = (clone.getElementsByTagName("img").src = responseXML.getElementsByTagName("Img")[i].childNodes[0].nodeValue);
        console.log(img);

    }

}

