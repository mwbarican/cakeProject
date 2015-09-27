<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventory Controller
 *
 * @property \App\Model\Table\InventoryTable $Inventory
 */
class InventoryController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
		$session = $this->request->session();
	}
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$subquery = $this->Inventory->find()
						->select(
							['item_id' => 'item_id',
							'created' => $this->Inventory->find()->func()->max('created')])
						->group('item_id');
		$inventory = $this->Inventory
					->find('all',
						['contain' => ['Item' => ['Unit'], 'Location']])
					->innerJoin(
						['t2'=>$subquery],
						['t2.item_id = inventory.item_id',
						't2.created = inventory.created']);
        $this->set(compact('inventory'));
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventory = $this->Inventory->newEntity();
        if ($this->request->is('post')) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->data);
            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $item = $this->Inventory->Item->find('list', ['limit' => 200]);
        $location = $this->Inventory->Location->find('list', ['limit' => 200]);
        $unit = $this->Inventory->Unit->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'item', 'location', 'unit'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventory = $this->Inventory->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->data);
            if ($this->Inventory->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $item = $this->Inventory->Item->find('list', ['limit' => 200]);
        $location = $this->Inventory->Location->find('list', ['limit' => 200]);
        $unit = $this->Inventory->Unit->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'item', 'location', 'unit'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventory->get($id);
        if ($this->Inventory->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function adjust($id = null, $modal = null)
    {
		if($modal)
		{
			$this->layout = 'modal';
		}
        $inventory = $this->Inventory->newEntity();
		$item = $this->Inventory->Item->get($id, ['contain'=>['Unit'],'limit' => 200]);
		if(isset($id))
		{
			$inventory->item_id = $id;
		}
		$inventory->unit_id = $item->store_unit;
        if ($this->request->is('post')) {
            $inventory = $this->Inventory->patchEntity($inventory, $this->request->data);
            if ($this->Inventory->save($inventory)) {
                $status = 'OK';
				$message = 'Adjustments Has Been Saved!';
            } else {
                $status = 'error';
				$message = 'Adjustments could not be save! Please try again.';
            }
			$this->set(['status' => $status, 
						'message' => $message,	
						'_serialize' => ['status','message'] ]);
        }
		if(isset($id))
		{
			$inventory = $this->Inventory->find('all',['contain'=>['Item']])
										->where(['item_id' => $id])
										->order(['created' => 'desc'])
										->first();
		}
		$inventory->isNew(true);
		
        
        $location = $this->Inventory->Location->find('list', ['limit' => 200]);
        $unit = $this->Inventory->Item->Unit->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'item', 'location', 'unit', 'modal','has_selection'));
    }
}
