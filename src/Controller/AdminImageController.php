<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdminImage Controller
 *
 * @property \App\Model\Table\AdminImageTable $AdminImage
 */
class AdminImageController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Admin']
        ];
        $this->set('adminImage', $this->paginate($this->AdminImage));
        $this->set('_serialize', ['adminImage']);
    }

    /**
     * View method
     *
     * @param string|null $id Admin Image id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adminImage = $this->AdminImage->get($id, [
            'contain' => ['Admin']
        ]);
        $this->set('adminImage', $adminImage);
        $this->set('_serialize', ['adminImage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adminImage = $this->AdminImage->newEntity();
		$adminImage->admin_id = 1;
        if ($this->request->is('post')) {
            $adminImage = $this->AdminImage->patchEntity($adminImage, $this->request->data);
            if ($this->AdminImage->save($adminImage)) {
                $this->Flash->success(__('The admin image has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The admin image could not be saved. Please, try again.'));
            }
        }
        $admin = $this->AdminImage->Admin->find('list', ['limit' => 200]);
        $this->set(compact('adminImage', 'admin'));
        $this->set('_serialize', ['adminImage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin Image id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adminImage = $this->AdminImage->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adminImage = $this->AdminImage->patchEntity($adminImage, $this->request->data);
            if ($this->AdminImage->save($adminImage)) {
                $this->Flash->success(__('The admin image has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The admin image could not be saved. Please, try again.'));
            }
        }
        $admin = $this->AdminImage->Admin->find('list', ['limit' => 200]);
        $this->set(compact('adminImage', 'admin'));
        $this->set('_serialize', ['adminImage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin Image id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adminImage = $this->AdminImage->get($id);
        if ($this->AdminImage->delete($adminImage)) {
            $this->Flash->success(__('The admin image has been deleted.'));
        } else {
            $this->Flash->error(__('The admin image could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
