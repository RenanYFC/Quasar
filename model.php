<?php 

class Model{
    public $dados;
    public function makeConnection() {
        $host = "*****";
        $user = "*****";
        $pass = "*****";
        $db = "*****";

        $con = mysqli_connect($host,$user,$pass,$db);
        $con->set_charset("utf8mb4");

        if ($con) {
            $sql = "SELECT * FROM jogos";
            $query = mysqli_query($con,$sql);
            return $query;
        }
    }

    public function getName($query) {
        $arrNames = array();
        if ($query) {
            if (mysqli_num_rows($query)>0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($arrNames, $row['nome']);
                }
                return $arrNames;
            }
        }
    }

    public function getDesc($query) {
        $arrDesc = array();
        if ($query) {
            if (mysqli_num_rows($query)>0) {
                // Voltar o ponteiro para o início do while
                mysqli_data_seek($query, 0);
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($arrDesc, $row['descricao']);
                }
                return $arrDesc;
            }
        }
    }

    public function getImage($query) {
        $arrImage = array();
        if ($query) {
            if (mysqli_num_rows($query)>0) {
                mysqli_data_seek($query, 0);
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($arrImage, $row['imagem']);
                }
                return $arrImage;
            }
        }
    }

    public function getPrice($query) {
        $arrPreco = array();
        if ($query) {
            if (mysqli_num_rows($query)>0) {
                mysqli_data_seek($query, 0);
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($arrPreco, $row['preco']);
                }
                return $arrPreco;
            }
        }
    }

    public function getOffer($query) {
        $arrOffer = array();
        if ($query) {
            if (mysqli_num_rows($query)>0) {
                mysqli_data_seek($query, 0);
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($arrOffer, $row['desconto']);
                }
                return $arrOffer;
            }
        }
    }

    public function getSales($query) {
        $arrSales = array();
        if ($query) {
            if (mysqli_num_rows($query)>0) {
                mysqli_data_seek($query, 0);
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($arrSales, $row['vendas']);
                }
                return $arrSales;
            }
        }
    }


}

?>