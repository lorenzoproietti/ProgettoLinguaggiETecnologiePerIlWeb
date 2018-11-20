function validaForm() {
    if(new Date(document.getElementById("departureDate").value).getTime() > new Date(document.getElementById("returnDate").value).getTime()) {
        alert("The return date must be later than the departure date");
        return false;
    }
    if(document.getElementById("continentalArea").value == "None") {
        alert("Enter a continental area");
        return false;
    }
    if(parseInt(document.getElementById("temp1").value) > parseInt(document.getElementById("temp2").value)) {
        alert("The minimum temperature must be less than or equal to the maximum temperature");
        return false;
    }
    alert("Form completed correctly, flight search");
    return true;
}

function infoClient() {
    if(document.getElementById("save-info").checked) alert("You have selected to save this information for the next time");
    else alert("You have selected not to save this information for the next time");
    return true;
}