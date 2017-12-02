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