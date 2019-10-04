<?php

namespace Model;

use Core\Database;
use Core\Entity;

class FilmModel extends entity
{
    public function displayFilms() {
        $sql = "SELECT * FROM film";
        
    }



}
