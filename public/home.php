<?php
include_once '../src/header.php';
include 'connect.php';
$conn = openCon();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Carte des Stations Velib</title>
    <!-- Inclure les feuilles de style de Leaflet -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    />
</head>
<body>
      <div style="height: 100vh;width: 100vw;">
          
          <div class="menu">
            <ul>
                <li id="iframeButton" onclick="loadIframe(1)"><a href="#" class="active">Map</a></li>
                <li id="iframeButton" onclick="loadIframe(2)"><a href= "#">Travaux</a></li>
                <li id="iframeButton" onclick="loadIframe(3)"><a href="#">Velib</a></li>
                <li id="iframeButton" onclick="loadIframe(4)"><a href="#">Futur</a></li>
                <li id="iframeButton" onclick="loadIframe(5)"><a href="#">Zone 20</a></li>
            </ul>
            <div class="animation-box"></div>
        </div>
        <div id="iframeContainer" class="iframeContainer">
            <iframe src="voie_future.php" style="height:92%;width:100%;" title="Iframe Example" class="frame"></iframe>      
        </div>
        
      </div>


 
</body>

<style>
    body {
        height: 100vh;
        width: 100vw;
        overflow: hidden;
        margin: 0px;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    .iframeContainer{
        height:100vh;
    }

    .menu {
        background-color: #FFFF;
        color: black;
        text-align: center;
        padding:1rem;
        font-size:xl;
    }

    .menu .animation-box {
        width: 3rem;
        height: 3px;
        align-items: center;
        top: 50%;
        transform:TranslateX(-50%);
        background-color: #ff6600;
        position: relative;
        left: 0;
        transition: left 0.3s ease;
        /* Ajout de la transition */
    }

    .menu ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .menu ul li {
        display: inline;
        margin-right: 20px;
    }

    .menu ul li:last-child {
        margin-right: 0;
    }

    .menu ul li a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        position: relative;
    }

    .menu ul li a:hover {
        color: #ff6600;
    }
</style>

<script>
    const menuItems = document.querySelectorAll('.menu ul li a');
    const animationBox = document.querySelector('.animation-box');
    
    // Initialisez la position de l'animation box pour correspondre à l'élément actif initial
    const activeItem = document.querySelector('.menu ul li a.active');
    if (activeItem) {
        positionAnimationBox(activeItem);
    }
    
    // Ajoutez un gestionnaire d'événements à chaque élément du menu
    menuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
    
            // Supprimez la classe 'active' de tous les éléments du menu
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
    
            // Ajoutez la classe 'active' à l'élément actuellement sélectionné
            item.classList.add('active');
    
            // Déplacez l'animation box vers l'élément actif
            positionAnimationBox(item);
        });
    });
    
    // Fonction pour positionner l'animation box
    function positionAnimationBox(element) {
        const itemRect = element.getBoundingClientRect();
        animationBox.style.left = itemRect.left + 'px';
    }
    
    function loadIframe(iframeNumber) {
    const iframeContainer = document.getElementById('iframeContainer');

    // Supprimez l'iframe actuelle s'il y en a une
    while (iframeContainer.firstChild) {
        iframeContainer.removeChild(iframeContainer.firstChild);
    }

    // Créez une nouvelle iframe
    const iframe = document.createElement('iframe');
    if(iframeNumber == 1){
         iframe.src = `https://ynov-b3.000webhostapp.com/public/voie_future.php`; // Remplacez par le chemin de votre iframe
    }else if (iframeNumber == 2){
        iframe.src = `https://ynov-b3.000webhostapp.com/public/travaux.php`; // Remplacez par le chemin de votre iframe
    }else if (iframeNumber == 3){
        iframe.src = `https://ynov-b3.000webhostapp.com/public/velib.php`;
    } else if (iframeNumber == 4){
        iframe.src = `https://ynov-b3.000webhostapp.com/public/voie_future.php`;
    }else if (iframeNumber == 5){
        iframe.src = `https://ynov-b3.000webhostapp.com/public/voie_20km.php`;
    }else {
        iframe.src = `https://ynov-b3.000webhostapp.com/public/voie_futue.php`;
    }
   
    iframe.style.width = '100%';
    iframe.style.height = '92%';

    // Ajoutez l'iframe à la div
    iframeContainer.appendChild(iframe);
}
</script>

</html>
