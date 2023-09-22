<?php
namespace App\Controller;

use App\Model\Entity\Item;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Model\Table\ItemsTable;
use Cake\ORM\TableRegistry;

class ItemsController extends AppController{

    //public $components = array('Session');
    
    public function edit($id = null)
    {
        $this->set('title_for_layout', 'Items');
        if(!$id)
        {
			// set a specific error with individual message
            throw new NotFoundException(__("ID was not set."));
        }
        
        $data = $this->Items->findById($id)->first();
        $item = $this->Items->get($id);
        $this->set(compact('item'));
        $this->set('categories', $this->Items->Categories->find('list', array('order' => 'name')));


        $request_data = $this->request->getData();
        $request_data['id'] = $id;
        if(!$data)
        {
            throw new NotFoundException(__("ID was not in the Database."));
        }
        
        if($this->request->is('post') || $this->request->is('put'))
        {
			// save the data and if it's a success then redirect them to the correct location
            $item = $this->Items->patchEntity($item, $request_data);
            if($this->Items->save($item))
            {
                //$this->Session->setFlash(__('The item was updated.'));
                $this->Flash->success(__('This item was updated'));
                $this->redirect('/items');
            }
            else
            {
                //$this->Session->setFlash(__('The item was not updated.'));
                $this->Flash->error(__('The item ws not updated'));
            }
        }
        
		// default the form with data from the database
        //print_r($data);
        //print_r($this->request->data);
        //$this->request->data =  $data;
    }
    
    
    public function add()
    {
        $this->set('title_for_layout', 'Add An Item');
        $item = $this->Items->newEntity();
        if($this->request->is('post'))
        {
			// prepare the model to insert a new item in the database
            //$this->Items->create();
            
            //$data = $this->request->data;
            
            // echo $data['title'];
            // $itemsTable = TableRegistry::getTableLocator()->get('Items');
            // $item = $itemsTable->newEntity();
            // $item->title = $data['title'];
            // $item->description = $data['description'];
            // $item->year = $data['year'];
            // $item->length = $data['length'];
            //$item = $this->Items->newEntity($data);

            $item = $this->Items->patchEntity($item, $this->request->getData());
            if($this->Items->save($item))
            {
                $this->redirect('/items');
            }
            else
            {
                // if the data fails do something
            }
        }
        $this->set('categories', $this->Items->Categories->find('list', array('order' => 'name')));
        $this->set(compact('item'));
    }
    public function index(){
        $this->set('title_for_layout', 'Items');
        //calls the database
        //retrieves items from the Item table using the Item Model
        //stores the variables from our database and passes them to the view

        //$this->set('color', 'blue');
        $data = $this->Items->find('all', array('order' => 'year'));
        $count = $data->count('*');  
        $info = array(
            'items' => $data,
            'count' => $count
        );
        //$this->set('items', $data);
        //$this->set('count', $count);
        $this->set($info);

    }
    public function _countItems(){
        #anything we put in this function will not be accessible to the outside world
    }
    public function view($id = null){
        //$this->layout = '_default';
        if(!$id)
        {
            throw new NotFoundException(__("ID was not set."));
        }
        
		// search the database based on the id (primary key) of the item 
        $data = $this->Items->findById($id)->contain(['Categories'])->first();
        
        if(!$data)
        {
            throw new NotFoundException(__("ID was not in the Database."));
        }
        
		// set the variable to display the query results
        $this->set('item', $data);

    }

    public function delete($id = null)
    {
        $this->set('title_for_layout', 'Items');
		// set the model to the id that you want to work with.
        //$this->Items->id = $id;
        
		// does the item exist? is it set?
        if(!$id || !$this->Items->exists(['id' => $id]))
        {
            throw new NotFoundException(__("ID was not set."));
        }
        $item = $this->Items->get($id);
        
		// make sure the request came via post
        if($this->request->is('post'))
        {
			// if the delete was a success
            if($this->Items->delete($item))
            {
				// display a message for the user to see the results
                $this->Flash->success(__("The item was deleted."));
            }
            else
            {
                $this->Flash->error(__("The item was not deleted."));
            }
        }
        else
        {
            $this->Flash->error(__("The item was not deleted because it was accessed via a get request."));
        }
      
		// redirect the user to the correct results page after the deletion
        $this->redirect('/items');
    }

    public function search($search = null)
    {
        $this->set('title_for_layout', 'Items');
        if(!$search)
        {
            $data = $this->Items->find('all', array('order' => 'year'));
            $count = $data->count('*');
        }
        else
        {
			//-- Query the database using a Where clause
            $data = $this->Items->find('all', 
				array(
					'order' => 'year',
					'conditions' => array('title LIKE' => '%'.$search.'%')
                )
			);
            $count = $data->count('*');  
        }
                
		// Set up your Variables to pass into the view
        $info = array(
            'items' => $data,
            'count' => $count
        );
        
        $this->set($info);

		// Use the index template instead of the default rendered search template
        $this->render('index');
    }
    
    

}

?>