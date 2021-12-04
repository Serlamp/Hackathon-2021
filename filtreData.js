let order = "asc";
let type = "cladire";

function showData(){
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
        document.getElementById('result').innerHTML = this.responseText;
    }
    xmlhttp.open("GET", "/PHP/admin.php?order=" + order + "&type=" + type);
    xmlhttp.send();
}
