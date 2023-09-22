<?php

namespace App\Model\Entity;
use Cake\ORM\Entity;
class Item extends Entity{

protected $_accessible = [
    'title' => true,
    'year' => true,
    'length' => true,
    'description' => true

];



}

?>