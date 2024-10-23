<?php

namespace App\Repository;

use Gravity\Core\App\Entity\Entity;
use Gravity\Core\App\Repository\Repository;


class BaseRepository extends Repository {

    public static function update(Entity $entity) {
        
        if(in_array('updated_at', static::getColumns())) {
            $entity->updated_at = static::currentDateTime();
        }

        return parent::update($entity);
    }


    

}


?>