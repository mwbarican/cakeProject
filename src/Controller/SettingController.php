<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use App\Controller\AppController;
use Cake\Event\Event;

class SettingController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
		$session = $this->request->session();
	}
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add', 'logout']);
	}
	
	public function index()
	{
		//user
		$data = $this->DataTables->find('Admin', [
			'contain' => ['Designation']
		]);
		$this->set([
			'admin' => $data,
			'_serialize' => array_merge($this->viewVars['_serialize'], ['admin'])
		]);
		$designation = $this->DataTables->find('Designation');
		$this->set([
			'designation' => $designation,
			'_serialize' => array_merge($this->viewVars['_serialize'], ['designation'])
		]);
	}
}

?>