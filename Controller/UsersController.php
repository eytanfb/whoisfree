<?php

    class UsersController extends AppController
    {
        var $name = 'Users';
        var $helpers = array('Session');
        
        // function index()
        // {
            // $this->set('users', $this->User->find('all'));
            // $this->set('title_for_layout', 'All Users');
        // }

        function view($id = NULL)
        {
            $this->set('user', $this->User->read(NULL, $id));
            $user = $this->User->findById($id);
            $this->set('group', $this->User->Group->query("select *
                from users
                where id in (select g.friend
                from users u, groups g
                where g.user_id =".$id." and u.id = g.user_id) LIMIT 5"));
            $this->set('schedule', $this->User->NewSchedule->query('select * from new_schedule as NewSchedule where user_id = ? order by start_time', array($id)));
            $this->set('title_for_layout', 'Welcome '.$user['User']['first_name']);
            $this->set('isFree', $this->isFree($this->Auth->User('id')));           
        }
        
        function view_friend($id = NULL)
        {
            $this->set('user', $this->User->read(NULL, $id));
            $user = $this->User->findById($id);
            $this->set('group', $this->User->Group->query("select *
                from users
                where id in (select g.friend
                from users u, groups g
                where g.user_id =".$id." and u.id = g.user_id) LIMIT 5"));
            $this->set('schedule', $this->User->NewSchedule->query('select * from new_schedule as NewSchedule where user_id = ? order by start_time', array($id)));
            $this->set('title_for_layout', 'You are viewing '.$user['User']['first_name'].'\'s Page');
            $this->set('isFree', $this->isFree($id));            
        }
        
        function signup()
        {
            $this->set('title_for_layout', 'Add Users');
            if (!empty($this->request->data))
            {
                $this->User->create();
                if ($this->User->save($this->request->data))
                {
                    $this->Session->setFlash(__('User succesfully created'));
                    if($this->Auth->login($this->request->data))
                    {
                        $this->Session->setFlash(__('Welcome, ' . $this->request->data['User']['first_name']));                                                        
                        $this->redirect(array('action' => 'view', $this->Auth->User('id')));
                    }
                }
                else
                {
                    $this->Session->setFlash(__('The user could not be created. Please, try again.'));
                }
            }            
            $this->redirect(array('controller' => 'pages', 'action' => 'display'));
        }
        
        // function delete($id = NULL)
        // {
            // if($this->User->delete($id))
                // $this->Session->setFlash("User successfully deleted");
//             
            // $this->redirect(array('action' => 'index'));
        // }
        
        public function login() 
        {
            if ($this->request->is('post')) 
            {
                if ($this->Auth->login()) 
                {                    
                    $this->Auth->deny('add');
                    $this->Session->setFlash(__('Welcome, '.CakeSession::read("Auth.User.first_name")));
                    $this->layout = 'logged_in';
                    $this->redirect(array('action' => 'view', CakeSession::read("Auth.User.id")));                    
                } 
                else 
                {
                    $this->Session->setFlash(__('Invalid username or password, try again'));
                }
            }
        }
        
        public function logout()  
        {
            $this->redirect($this->Auth->logout());
        }
        
        public function isFree($id)
        {
            $schedule = $this->User->NewSchedule->query('select * from new_schedule as NewSchedule where user_id = ? order by start_time', array($id));
            date_default_timezone_set('America/Los_Angeles');            
            $current_time = strtotime(date('H:i:s', time()));
            foreach($schedule as $schedule_item):
                if ($current_time > strtotime($schedule_item['NewSchedule']['start_time']) && $current_time < strtotime($schedule_item['NewSchedule']['end_time']) && date('l') === $schedule_item['NewSchedule']['day']) 
                {
                    return false;
                }
            endforeach;
            return true;
        }     

    }
?>