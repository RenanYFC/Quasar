<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quasar</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/logo-icon.png" />
</head>
<body>

    <!-- Header -->
    <header id="header">
        <img src="img/logo-quasar.png" alt="" id="logo">
    </header>

    <!-- Content - Banner -->
    <section id="banner">
        <div id="banner-img">
            <div id="figure">
               <!--- <div id="shadow"></div>-->
                <img src="img/banner-img-with-shadow.png" alt="">
            </div>
        </div>
        <div id="banner-text">
            <h1>Indulge in gaming variety. Simplify your experience.</h1>
            <a href="#line">Let's Play!</a>
        </div>
    </section>
    
    <!-- Line -->
    <div id="line"></div>
    <!-- Title -->
        <h1 id="games-h1">All Games</h1>
    <!-- Games -->
    <section id="games">
    <?php
            require_once "controller.php";
            $controller = new Controller();
            $controller->loadGames();
         ?>
    </section>
    <footer></footer>
    <div id="overlay">
        <p>abc</p>
    </div>
    <div id="description">
        <img src="img/exit-img.png" alt="" id="exit-btn">
        <p id="description-content">
            
        </p>
        <img src="img/wave.png" alt="" id="wave">
    </div>
        <script>

        const alturaTotalDaPagina = document.querySelector("body").scrollHeight;

        var overlay = document.querySelector("#overlay");
        var description = document.querySelector("#description")
        overlay.style.height = alturaTotalDaPagina + "px"

        var card = document.querySelectorAll(".btn-details")
        var cardsContainer = document.querySelectorAll(".card-game")
        var cardDesc = document.querySelector("#description-content")
        Array.from(card).forEach((a,index)=>{
            card[index].addEventListener('click',()=>{
                overlay.style.display = "flex";
                description.style.display = "flex";
                let desc = cardsContainer[index].getAttribute('description')
                cardDesc.innerText = desc
            })
        })

        var exitBtn = document.querySelector("#exit-btn")

        exitBtn.addEventListener('click',()=>{
            overlay.style.display = "none";
            description.style.display = "none";
            document.body.style.overflow = "auto"
        })

    </script>
</body>
</html>