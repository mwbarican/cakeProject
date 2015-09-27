<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupplierItem Controller
 *
 * @property \App\Model\Table\SupplierItemTable $SupplierItem
 */
class SupplierItemController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Supplier', 'Item']
        ];
        $this->set('supplierItem', $this->paginate($this->SupplierItem));
        $this->set('_serialize', ['supplierItem']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierItem = $this->SupplierItem->get($id, [
            'contain' => ['Supplier', 'Item']
        ]);
        $this->set('supplierItem', $supplierItem);
        $this->set('_serialize', ['supplierItem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplierItem = $this->SupplierItem->newEntity();
        if ($this->request->is('post')) {
            $supplierItem = $this->SupplierItem->patchEntity($supplierItem, $this->request->data);
            if ($this->SupplierItem->save($supplierItem)) {
                $this->Flash->success(__('The supplier item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier item could not be saved. Please, try again.'));
            }
        }
        $supplier = $this->SupplierItem->Supplier->find('list', ['limit' => 200]);
        $item = $this->SupplierItem->Item->find('list', ['limit' => 200]);
        $this->set(compact('supplierItem', 'supplier', 'item'));
        $this->set('_serialize', ['supplierItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplierItem = $this->SupplierItem->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierItem = $this->SupplierItem->patchEntity($supplierItem, $this->request->data);
            if ($this->SupplierItem->save($supplierItem)) {
                $this->Flash->success(__('The supplier item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier item could not be saved. Please, try again.'));
            }
        }
        $supplier = $this->SupplierItem->Supplier->find('list', ['limit' => 200]);
        $item = $this->SupplierItem->Item->find('list', ['limit' => 200]);
        $this->set(compact('supplierItem', 'supplier', 'item'));
        $this->set('_serialize', ['supplierItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierItem = $this->SupplierItem->get($id);
        if ($this->SupplierItem->delete($supplierItem)) {
            $this->Flash->success(__('The supplier item has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
