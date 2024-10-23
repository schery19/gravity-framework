<?php

namespace App\Entity;

use Gravity\Core\App\Entity\Entity;


abstract class BaseEntity extends Entity {


    public function __construct($data = array()) {
        parent::__construct($data);

        $this->id = rand(1, 1000000);
    }



}


?>