let contenu = document.getElementById("contenu")
let manga = document.createElement("div");
manga.classList.add("manga");

let imgmanga = document.createElement("img")
imgmanga.classList.add("manga-img")
imgmanga.src = "images/"+obj[i]["nom"]+"-logo.jpg"
imgmanga.alt = ""
let imgvert = document.createElement("img");
imgvert.classList.add("manga-vert");
imgvert.id = "vert"+i
imgvert.src = "images/vert.png"
img.alt = ""
let nomManga = document.createElement("p")
let nombrechap = document.createElement("p")
nomManga.value = obj[i]["libelle"]
nombrechap.id = "nombreChap" + i
nombrechap.value = obj[i]["nombreChapitre"]
manga.appendChild(imgmanga)
manga.appendChild(imgvert)
manga.appendChild(nomManga)
manga.appendChild(nombrechap)
let idbutton = document.createElement("div")















contenu.appendChild(manga)