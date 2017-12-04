function displayDonor(donorButton) {
    document.getElementById('center').style.display = "none";
    // document.getElementById('donorcenter').style.display = "none";

    var donor_id = donorButton.id;
    // getPatients(donor_id);
    getPatients(donor_id);

    getMeds(donor_id);
    getDiseases(donor_id);
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("donor").innerHTML = this.responseText;
            document.getElementById("donor").style.display = "block";
            document.getElementById("donorstuff").style.display = "block";

        }

    };
    xmlhttp.open("GET", "get-donor-detail.php?q=" + donor_id, true);
    xmlhttp.send();


}

function getPatients(donor_id) {
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
    xmlhttp.open("GET", "get-potential-patients.php?q=" + donor_id, true);
    xmlhttp.send();
}

function getMeds(donor_id) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("meds").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "get-donor-meds.php?q=" + donor_id, true);
    xmlhttp.send();
}

function getDiseases(donor_id) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("disease").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "get-donor-diseases.php?q=" + donor_id, true);
    xmlhttp.send();
}


function gotoPatients() {
    location.href = "patients";
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
            document.getElementById("dd").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "get-donors.php?", true);
    xmlhttp.send();

}