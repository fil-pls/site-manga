let obj = {};
let xhr = new XMLHttpRequest();
xhr.open("POST", "../controller/getAllMangas.php", true);
xhr.onreadystatechange = function () {
if (xhr.readyState == 4 && xhr.status == 200) {
    obj = JSON.parse(xhr.responseText);

    for(let i = 0;i<obj.length;i++){
        if(obj[i]["green"] == 1){
            let vert = document.getElementById("vert"+i)
            vert.style.visibility="visible"
        } else {
            let vert = document.getElementById("vert"+i)
            vert.style.visibility="hidden"
        }
        }
    }
    let ligne = document.querySelector("#contenu");
    let nbrLine = (obj.length + 2) / 7
    ligne.style.gridTemplateRows = "repeat("+Math.ceil(nbrLine)+",370px)"

    
}
xhr.send();

function showFormAdd(){
    let form = document.querySelector(".formAdd");
    form.style.visibility = "visible";

}

function hideFormAdd(){
    let form = document.querySelector(".formAdd");
    let message = document.querySelector("#Message")
    form.style.visibility = "hidden";
    message.style.visibility = "hidden";
}

function green(param,nom){
    let vert = document.getElementById(param)
    vert.style.visibility = "visible";

    let xhr = new XMLHttpRequest();
    let form = new FormData();

    form.append("chiffre",1);
    form.append("nom",nom)
    xhr.open("POST","../controller/green.php",true);
    xhr.send(form);

}


function ungreen(param,nom){
    let vert = document.getElementById(param)
    vert.style.visibility = "hidden";

    let xhr = new XMLHttpRequest();
    let form = new FormData();

    form.append("chiffre",0);
    form.append("nom",nom)
    xhr.open("POST","../controller/green.php",true);
    xhr.send(form);
}

function greenReset(){
    let vert = document.querySelectorAll("[id^=vert]");
    for(let i = 0;i<vert.length;i++){
        if(vert[i].style.visibility = "visible"){
            vert[i].style.visibility = "hidden"
        }
    }

    let xhr = new XMLHttpRequest();

    xhr.open("POST","../controller/greenReset.php",true);
    xhr.send(null);

}

function showForm(param){
    let form = document.getElementById(param)
    form.style.visibility="visible"
}

function hideForm(param){
    let form = document.getElementById(param)
    form.style.visibility="hidden"
}

function submitAjout(){
    let nom = document.querySelector("#nom")
    let libelle = document.querySelector("#libelle")
    let numberChapitre = document.querySelector("#numberChapitre")

    let xhr = new XMLHttpRequest();
    let form = new FormData();

    form.append("nom",nom.value)
    form.append("libelle",libelle.value)
    form.append("nombreChapitre",numberChapitre.value)

    xhr.onreadystatechange = function (){

        if(xhr.readyState === 4 && xhr.status === 200) {
            let resultat = JSON.parse(xhr.responseText);
            let Message = document.querySelector("#Message");

            if (resultat.erreur === 1) {
                Message.style.visibility ="visible"
                Message.innerHTML = resultat.msg
                Message.style.color = "red"
            } else if (resultat.erreur === 0) {
                Message.style.visibility ="visible"
                Message.innerHTML = resultat.msg
                Message.style.color = "green"
            }
        
        }
    }
    xhr.open("POST","../controller/save.php",true);
    xhr.send(form);

}


function updateNombre(nom,cible){
    let newNombre = document.getElementById(cible)
    let amaru = ''
    if(cible.length==10){
        amaru = cible.charAt(cible.length - 1)
    } else if(cible.length==11){
        let avantdernier = cible.charAt(cible.length - 2)
        let lolilol = cible.charAt(cible.length - 1)
        amaru = avantdernier + lolilol
    }
    console.log(amaru)
    let xhr = new XMLHttpRequest();
    let form = new FormData();
    console.log(cible)
    form.append("nom",nom)
    form.append("nombreChapitre",newNombre.value)

    xhr.open("POST","../controller/update.php",true);
    xhr.send(form);
    xhr.onreadystatechange = function () {

        if(xhr.readyState === 4 && xhr.status === 200) {
            let resultat = JSON.parse(xhr.responseText);
            let nombreChapDiv = document.querySelector("#nombreChap"+amaru);

            if (resultat.erreur === 1) {
                nombreChapDiv.style.color='red'
            } else if (resultat.erreur === 0) {
                nombreChapDiv.style.color='#37bc17'
            }
        
        }

    }

}