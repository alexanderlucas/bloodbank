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
    xmlhttp.open("GET", "get-donations.php?", true);
    xmlhttp.send();
}

function getDonationDetail(button) {
    donor_id = button.id.split(',')[0];
    patient_id = button.id.split(',')[1];
    bank_id = button.id.split(',')[2];


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
    xmlhttp.open("GET", "get-donation-detail.php?donor_id=" + donor_id + "&patient_id=" + patient_id + "&b=" + bank_id + "", true);
    xmlhttp.send();
}