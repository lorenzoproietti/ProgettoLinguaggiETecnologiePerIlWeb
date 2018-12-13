function validaForm() {
    if(document.getElementById("departureCity").value == "") {
        _alert("Error", "Valid departure city is required.");
        return false;
    }
    if(document.getElementById("departureDate").value == "") {
        _alert("Error", "Valid departure date is required.");
        return false;
    }
    if(document.getElementById("returnDate").value == "") {
        _alert("Error", "Valid return date is required.");
        return false;
    }
    if(document.getElementById("temp1").value == "") {
        _alert("Error", "Please enter the desired minimum temperature.");
        return false;
    }
    if(document.getElementById("temp2").value == "") {
        _alert("Error", "Please enter the desired maximum temperature.");
        return false;
    }
    if(new Date(document.getElementById("departureDate").value).getTime() > new Date(document.getElementById("returnDate").value).getTime()) {
        _alert("Error", "The return date must be later than the departure date");
        return false;
    }
    if(document.getElementById("continentalArea").value == "None") {
        _alert("Error", "Enter a continental area");
        return false;
    }
    if(parseInt(document.getElementById("temp1").value) > parseInt(document.getElementById("temp2").value)) {
        _alert("Error", "The minimum temperature must be less than or equal to the maximum temperature");
        return false;
    }
    if(document.getElementById("save-info").checked) {
        localStorage.setItem("departureCity", document.getElementById("departureCity").value);
        localStorage.setItem("departureDate", document.getElementById("departureDate").value);
        localStorage.setItem("returnDate", document.getElementById("returnDate").value);
        localStorage.setItem("temp1", document.getElementById("temp1").value);
        localStorage.setItem("temp2", document.getElementById("temp2").value);
        localStorage.setItem("continentalArea", document.getElementById("continentalArea").value);
    }
    return true;
}

function infoClient() {
    if(document.getElementById("save-info").checked) _alert("Info", "You have selected to save this information for the next time");
    else _alert("Info", "You have selected not to save this information for the next time");
    return true;
}

function sectFields() {
    if(localStorage.getItem("departureCity") != null) {
        document.getElementById("departureCity").value = localStorage.getItem("departureCity");
        document.getElementById("departureDate").value = localStorage.getItem("departureDate");
        document.getElementById("returnDate").value = localStorage.getItem("returnDate");
        document.getElementById("temp1").value = localStorage.getItem("temp1");
        document.getElementById("temp2").value = localStorage.getItem("temp2");
        document.getElementById("continentalArea").value = localStorage.getItem("continentalArea");
    }
    return true;
}