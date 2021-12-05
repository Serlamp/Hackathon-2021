const xmlhtpp = new XMLHttpRequest();
let data;
let dataArray = [];
let str;
let k = 0;
let poz = 0;
let substr;
let dataArray2 = [];
xmlhtpp.onprogress = function() {
    data = xmlhtpp.responseText;
    while(str = data.substr(0, data.indexOf('\n'))){
        data = data.slice(data.indexOf('\n') + 1);
        dataArray[k++] = str;
    }
}
xmlhtpp.open("GET", "/Data/data.txt");
xmlhtpp.send();

function  filtruDate(cuv) {  
    if(strstr(cuv)){
        return true;
    }
}

function strstr(cuvant) {
    var length = substr.length;
    for(let i = 0;i < length;i++){ 
        cuvant = cuvant.toUpperCase();
        substr = substr.toUpperCase();     
        if(cuvant[i] != substr[i]){
            return false;
        }
    }
    return true;
}

function filterData() {
    document.getElementById('ceva').innerHTML = '';
    dataArray2 = [];
    poz = 0;
    substr = document.getElementById('input').value;
    for(let i = 0;i < dataArray.length && poz < 5;i++){
        if(filtruDate(dataArray[i])){
            let btn = document.createElement("button");
            btn.innerHTML = `${dataArray[i]}`;
            btn.onclick = function () {
                document.getElementById('input').value = dataArray[i];
                document.getElementById('ceva').innerHTML = ''
            }
            document.getElementById('ceva').appendChild(btn);
            poz++;
        }
    }
}

function checkData(){
    let cuv = document.getElementById('input').value;
    cuv = cuv.toUpperCase();
    let exista = false;
    for(let i = 0;i < dataArray.length;i++){
        let cuv2 = dataArray[i].toUpperCase();
        if(cuv.trim() === cuv2.trim()){
            console.log("bine");
            exista = true;
            cuv = dataArray[i];
            
        }
    }
    if(!exista){
        document.getElementById('input').value = '';
    }
}