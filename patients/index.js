function displayPatient(patientButton) {
    alert('hi');
    var name = patientButton.id;

    var con = mysql.createConnection({
        host: "http://eecs341finalproject.clsvctncuryj.us-east-2.rds.amazonaws.com",
        user: "eecs341",
        password: "eecs341bloodbank",
        database: "bloodbank"
    });

    con.connect(function(err) {
        if (err) throw err;
        con.query("SELECT * FROM customers", function(err, result, fields) {
            if (err) throw err;
            console.log(result);
        });
    });
    alert(name);

}