<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() 
	{
	    $friend_list = $this->Group->query("select *
            from users
            where id in (select g.friend
            from users u, groups g
            where g.user_id =".$this->Auth->User('id')." and u.id = g.user_id)");
		$this->set('groups', $friend_list);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}        
		$this->set('group', $this->Group->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
	{	    
	    if(!empty($this->params['pass']))
        {
            $friend_id = $this->params['pass']['0'];
            $user_id = $this->Auth->User('id');
            $already_friends = $this->Group->findAllByUserIdAndFriend($user_id, $friend_id);
            if($already_friends)
            {
                $this->Session->setFlash(__('You are already friends', true));
            }
            else
            {
                $data = array('user_id' => $user_id, 'friend' => $friend_id);
                if($this->Group->saveAll($data))
                {
                    $friend = $this->Group->User->findById($friend_id);
                    $this->Session->setFlash(__('You are now friends with '. $friend['User']['first_name'], true));
                }
                else {                    
                    $this->Session->setFlash(__('Failed to add friend. Please try again, '.pr($data), true));
                }               
            }
            $this->redirect(array('controller' => 'users', 'action' => 'view', $user_id));
        }		
		$this->Session->setFlash(__('Data empty. Please try again. '));
        $this->redirect(array('action' => 'find'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
		}
		$users = $this->Group->User->find('list');
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
	public function delete($id = null) 
	{
	    $friend = $this->Group->User->findById($id);
	    $friendship = $this->Group->findByUserIdAndFriend($this->Auth->User('id'), $id);
        $friendship_id = $friendship['Group']['id'];
        // if (!$this->request->is('post')) {
			// throw new MethodNotAllowedException();
		// }
		$this->Group->id = $friendship_id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__($friend['User']['first_name']. ' '.$friend['User']['last_name']. ' unfriended'));
			$this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->User('id')));
		}
		$this->Session->setFlash(__('Couldn\'t unfriend. Please try again.'));
		$this->redirect(array('controller' => 'users', 'action' => 'view', $this->Auth->User('id')));
	}
    
    public function find()
    {
        if($this->request->is('post'))
        {
            if(!empty($this->request->data))
            {
                $first_name = $this->request->data['group']['first_name'];
                $last_name = $this->request->data['group']['last_name'];
                // $friends = $this->Group->User->findAllByFirstNameOrLastName($first_name, $last_name);
                $friends = $this->Group->User->query('select id, first_name, last_name
                                    from users as User where first_name = ? OR last_name = ?', array($first_name, $last_name));
            }
        }
        
        if(!empty($friends))
            $this->set('friends', $friends);
        else
            $this->set('friends', array());
    }
}