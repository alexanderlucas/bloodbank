function displayPatient(patientButton) {
    document.getElementById('center').style.display = "none";
    // document.getElementById('donorcenter').style.display = "none";

    var patient_id = patientButton.id;
    getDonors(patient_id);

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("patient").innerHTML = this.responseText;
        }
        if (this.readyState == 5 && this.status == 200) {
            document.getElementById("donorlist").innerHTML = this.responseText;
        }

    };
    xmlhttp.open("GET", "get-patient-detail.php?q=" + patient_id, true);
    xmlhttp.send();


}

function getDonors(patient_id) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("donorlist").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "get-potential-donors.php?q=" + patient_id, true);
    xmlhttp.send();
}

function gotoDonors() {
    location.href = "/donors";
}

function displayDonor(donorButton) {
    alert(donorButton.id);
}

window.onload = function() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pd").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "get-patients.php?", true);
    xmlhttp.send();

}