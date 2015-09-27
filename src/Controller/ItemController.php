<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Item Controller
 *
 * @property \App\Model\Table\ItemTable $Item
 */
class ItemController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$item = $this->Item->find('all', [
				'contain' => ['ItemCategory','ItemType']
			]);
		$types = $this->Item->ItemType->find('all');
		$categories = $this->Item->ItemCategory->find('all');
        $this->set(compact("item",'categories','types'));
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($modal = null)
    {
		if($modal)
		{
			$this->layout = 'modal';
		}
        $item = $this->Item->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Item->patchEntity($item, $this->request->data,['associated'=>['Inventory']]);
            if ($this->Item->save($item)) {
                $status = 'OK';
				$message = 'A New Supplier Has Been Saved!';
            } else {
                $status = 'error';
				$message = 'A New Supplier could not be save! Please try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
        $itemCategory = $this->Item->ItemCategory->find('list', ['limit' => 200]);
        $supplier = $this->Item->Supplier->find('list', ['limit' => 200]);
		$itemType = $this->Item->ItemType->find('list', ['limit' => 200]);
		$unit = $this->Item->Inventory->Unit->find('list', ['limit' => 200])->where(['unit_type_id'=>2]);
		$location = $this->Item->Inventory->Location->find('list', ['limit' => 200]);
        $this->set(compact('item', 'itemCategory', 'supplier', 'itemType', 'unit', 'location','modal'));    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $modal = null)
    {
		if($modal)
		{
			$this->layout = 'modal';
		}
		
        
        if ($this->request->is(['patch', 'post', 'put'])) 
		{
			if(isset($this->request->data['pk']))
			{
				$id=$this->request->data['pk'];
				$data = [$this->request->data['name'] => $this->request->data['value']];	
			}
			else
			{
				$data = $this->request->data;
			}
			$item = $this->Item->get($id, [
				'contain' => ['Supplier']
			]);
            $item = $this->Item->patchEntity($item, $data);
            if ($this->Item->save($item)) {
                $status = 'OK';
				$message = 'Changes to the Supplier has been Saved';
            } else {
                $status = 'error';
				$message = 'changes to the designation could not be saved. Please, try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		$item = $this->Item->get($id, [
			'contain' => ['Supplier']
		]);
        $itemCategory = $this->Item->ItemCategory->find('list', ['limit' => 200]);
        $supplier = $this->Item->Supplier->find('list', ['limit' => 200]);
		$itemType = $this->Item->ItemType->find('list', ['limit' => 200]);
        $this->set(compact('item', 'itemCategory', 'supplier', 'itemType','modal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Item->get($id, [
			'contain' => ['Supplier']
		]);
        if ($this->Item->delete($item)) {
			$this->set('message','designation has been deleted');
        } else {
            $this->set('message','designation could not be deleted. Please, try again');
        }
        $this->set('_serialize', ['message']);
    }
}
