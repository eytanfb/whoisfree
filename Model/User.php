<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel
{
    var $name = 'User';
    public $validate = array(
        'first_name' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'First Name cannot be blank',
                'allowEmpty' => false,
                'required' => true
            )
        ),
        'last_name' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Last Name cannot be blank',
                'allowEmpty' => false,
                'required' => true
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Email cannot be blank',
                'allowEmpty' => false,
                'required' => true
            ),
            'valid' => array(
                'rule' => array('email', true),          
                'message' => 'This is not a valid email',
                'required' => true
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'This email already exists',
                'required' => true
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notempty'),
                'message' => 'Password cannot be blank',
                'allowEmpty' => false,
                'required' => true
            ),
            'valid' => array(
                'rule' => array('minlength', 6),
                'message' => 'Password has to be at least 6 characters',
                'required' => true
            ),
            'password_has_to_be_alphanumeric' => array(
                'rule' => 'alphanumeric',
                'message' => 'Password has to be alphanumeric',
                'required' => true
            )
        )
    );
    
    public $hasOne = array('Group', 'NewSchedule');
    

        public function beforeSave($options = array()) 
        {
           if (isset($this->data[$this->alias]['password'])) 
           {
                $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
           }
           return true;
        }
        
        public function isFree($id)
        {
            $schedule = $this->User->NewSchedule->query('select * from new_schedule as NewSchedule where user_id = ? order by start_time', array($id));
            date_default_timezone_set('America/Los_Angeles');
            $current_time = strtotime(date('H:i:s', time()));      
            foreach($schedule as $schedule_item):
                if ($current_time > strtotime($schedule_item['NewSchedule']['start_time']) && $current_time < strtotime($schedule_item['NewSchedule']['end_time'])) 
                {
                    return false;
                }
            endforeach;
            return true;
        }
}
?>