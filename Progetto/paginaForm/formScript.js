function validaForm() {
    if(new Date(document.getElementById("departureDate").value).getTime() > new Date(document.getElementById("returnDate").value).getTime()) {
        alert("La data di ritorno deve essere successiva a quella di partenza");
        return false;
    }
    if(document.getElementById("continentalArea").value == "None") {
        alert("Inserire una zona continentale");
        return false;
    }
    if(parseInt(document.getElementById("temp1").value) > parseInt(document.getElementById("temp2").value)) {
        alert("La temperatura minima deve essere minore o uguale a quella massima desiderata");
        return false;
    }
    alert("Modulo compilato correttamente,ricerca voli");
    return true;
}

function infoClient() {
    if(document.getElementById("save-info").checked) alert("Hai selezionato di salvare queste informazioni per la prossima volta");
    else alert("Hai selezionato di non salvare queste informazioni per la prossima volta");
    return true;
}