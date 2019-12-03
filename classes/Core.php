<?php
require_once("Singleton.php");

class Core extends Singleton {
    /**
     * @return Core
     */
    public static function getInstance()
    {
        return parent::getInstance(); // TODO: Change the autogenerated stub
    }

    public function setHeader(string $title) {
        return '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link rel="stylesheet" href="./bootstrap.min.css">
            
                <title>'. $title.'</title>
            </head>';
    }

    public function getNavBar() {
        return '
            <nav class="navbar navbar-dark bg-dark" style="display: flex; justify-content: center;">
                <a href="index.php">
                    <img src="https://imagensemoldes.com.br/wp-content/uploads/2018/01/Logo-Filme-Carros-01.png" alt="" width=50px heigth=50px>
                </a>
            </nav>';
    }
}
