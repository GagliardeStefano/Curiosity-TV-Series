function functionCategorie(){
    document.getElementById("sezioneCategoria").style.visibility = "visible"
}

function functionSfocatura(){
    document.getElementById("sezioneSfocatura").style.visibility = "visible"
}

function functionCategorieNo(){
    document.getElementById("sezioneCategoria").style.visibility = "hidden"
}

function functionSfocaturaNo(){
    document.getElementById("sezioneSfocatura").style.visibility = "hidden"
}

var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}