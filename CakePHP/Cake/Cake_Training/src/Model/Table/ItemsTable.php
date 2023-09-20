<?php 

namespace App\Model\Table;

use Cake\ORM\Table;

class ItemsTable extends Table
{

    public function initialize(array $config)
    {
        $this->setTable('items');

        // Prior to 3.4.0
        $this->table('items');
    }
}

?>