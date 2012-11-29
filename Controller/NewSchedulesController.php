<?php
App::uses('AppController', 'Controller');
/**
 * NewSchedules Controller
 *
 * @property NewSchedule $NewSchedule
 */
class NewSchedulesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {	    
		$this->set('schedule', $this->NewSchedule->query('select * from new_schedule as NewSchedule where user_id = ? order by start_time', array($this->Auth->User('id'))));
        $this->set('title_for_layout', 'Your schedule');
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NewSchedule->id = $id;
		if (!$this->NewSchedule->exists()) {
			throw new NotFoundException(__('Invalid new schedule'));
		}
		$this->set('newSchedule', $this->NewSchedule->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
	{	    
	    if(!empty($this->request->data))
        {
    		if ($this->request->is('post')) 
    		{
    		    $this->request->data['NewSchedule']['user_id'] = $this->Auth->User('id');
    			$this->NewSchedule->create();                
    			if ($this->NewSchedule->save($this->request->data)) 
    			{
    				$this->Session->setFlash(__('The new schedule has been saved'));
    				$this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->User('id')));
    			} else 
    			{
    				$this->Session->setFlash(__('The new schedule could not be saved. Please, try again.'));
    			}
    		}
            
    		$users = $this->NewSchedule->User->find('list');
    		$this->set(compact('users'));
        }
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->NewSchedule->id = $id;
		if (!$this->NewSchedule->exists()) {
			throw new NotFoundException(__('Invalid new schedule'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NewSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The new schedule has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The new schedule could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NewSchedule->read(null, $id);
		}
		$users = $this->NewSchedule->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
	    if($this->NewSchedule->delete($id))
            $this->Session->setFlash(__('Schedule successfully deleted'));
        else
        {
            $this->Session->setFlash(__('Schedule not deleted'));
        }
        $this->redirect(array('action' => 'index'));
		// if (!$this->request->is('post')) {
			// throw new MethodNotAllowedException();
		// }
		// $this->NewSchedule->id = $id;
		// if (!$this->NewSchedule->exists()) {
			// throw new NotFoundException(__('Invalid new schedule'));
		// }
		// if ($this->NewSchedule->delete()) {
			// $this->Session->setFlash(__('New schedule deleted'));
			// $this->redirect(array('action' => 'index'));
		// }
		// $this->Session->setFlash(__('New schedule was not deleted'));
		// $this->redirect(array('action' => 'index'));
	}
}
