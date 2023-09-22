<?php 

namespace App\Model\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;


use Cake\ORM\Table;

class ItemsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('items');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        // Prior to 3.4.0
        //$this->table('items');

        $this->belongsTo('Categories')
             ->setForeignKey('category_id');
    }
    public function validationDefault(Validator $validator){
        //$validator->add('category_id', 'numeric');
        $validator->integer('category_id');
        
        $validator
        ->scalar('title')
        ->maxLength('title', 50)
        ->requirePresence('title', 'create')
        ->notEmptyString('title', 'You need to provide a title');

        $validator
        ->minLength('year',4, 'Please enter a 4 digit year.')
        ->maxLength('year',4, 'Please enter a 4 digit year.')
        ->notEmptyString('year')
        ->requirePresence('year', 'create')
        ->add('year', 'isValidYear', ['rule' => 'numeric', 'message' => 'Please enter a 4 digit year.']);

        $validator
        ->maxLength('length', 50)
        ->notEmptyString('length')
        ->requirePresence('length', 'create')
        ->add('length', 'validLength', ['rule' => 'numeric', 'message' => 'Please enter a valid length.']);


        return $validator;

    }

    
}

?>