<?php
require_once "model.php";

class Controller {
    public function loadHTMLGame($name, $offer, $price, $sales, $img, $newPrice, $desc) {
    $newPriceParsed= round($newPrice, 2);
    $newPriceParsed = number_format($newPriceParsed,2,',', '.');
    $HTMLcode = sprintf('
        <!-- Card -->
        <div class="card-game" description="%s">
            <!-- Results -->
            <div class="results">
                <!-- Stars -->
                <div class="stars-container">
                    <img src="img/star.png" alt="" class="stars">
                    <img src="img/star.png" alt="" class="stars">
                    <img src="img/star.png" alt="" class="stars">
                    <img src="img/star.png" alt="" class="stars">
                    <img src="img/star.png" alt="" class="stars">
                </div>
                <p class="sales">%s Sales</p>
            </div>
            <!-- IMG -->
            <div class="img-game" style="background-image: url(\'%s\');">
            </div>
            <!-- Text Container -->
            <div class="text-container">
                <p class="title-game">%s</p>
                <div id="price-container">
                    <p class="old-price">R$%s</p>
                    <div class="current-price">
                        <p class="price">R$%s</p>
                        <p class="offer">%s%% OFF</p>
                    </div>
                </div>
            </div>
            <!-- Button -->
                <button class="btn-details button-effect">Details</button>
        </div>
        ', $desc, $sales, $img, $name, $price, $newPriceParsed, $offer);
        echo $HTMLcode;
    }



    public function loadGames() {
        $modelo = new Model;
        $query = $modelo -> makeConnection();
        $names = $modelo -> getName($query);
        $descs = $modelo -> getDesc($query);
        $prices = $modelo -> getPrice($query);
        $offers = $modelo -> getOffer($query);
        $sales = $modelo -> getSales($query);
        $images = $modelo -> getImage($query);

        $i = 0;
        foreach ($names as $name) {
            $offerPrice = ($offers[$i]*$prices[$i])/100;
            $newPrice = $prices[$i]-$offerPrice;

            $this->loadHTMLGame($name, $offers[$i], $prices[$i], $sales[$i], $images[$i], $newPrice, $descs[$i]);
            $i++;
        }
    }

    public function loadView() {
        require "view.php";
    }
}

?>
