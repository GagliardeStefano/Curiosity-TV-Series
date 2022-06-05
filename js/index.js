function functionCategorie(){
    document.getElementById("sezioneCategoria").style.visibility = "visible"
}

function functionCategorieNo(){
    document.getElementById("sezioneCategoria").style.visibility = "hidden"
}

onchange = function episodi(){
    var select = document.getElementById("selezione")
    console.log(select.value)
}