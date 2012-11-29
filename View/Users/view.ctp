<h2><?php echo $user['User']['first_name'].'\'s Dashboard' ?></h2>

<div id="userTopHalf">
    
    <td><?php $random = rand(1,3);
     echo $isFree ? $this->Html->image('im_free_'.$random.'.jpg', array('style' => 'width: 689px; height: 242px')) 
     :  $this->Html->image('im_busy_'.$random.'.jpg', array('style' => 'width: 689px; height: 242px'));
      ?></td>
</div>

<div id="userTopHalf">
    <h3>Current Group</h3>
    
    <table>
        <?php echo $this->Html->tableHeaders(array('First Name', 'Last Name', 'Free?')) ?>
        
        <?php foreach($group as $friend): ?>
            <tr>
                <td><?php echo $this->Html->link($friend['users']['first_name'], array('action' => 'view_friend', $friend['users']['id'])) ?></td>
                <td><?php echo $this->Html->link($friend['users']['last_name'], array('action' => 'view_friend', $friend['users']['id'])) ?></td>
                <td><?php echo $this->requestAction('users/isFree/'.$friend['users']['id']) ? 'Yes' : 'No' ?></td>
                <td><?php echo $this->Html->link('Unfriend', array('controller' => 'groups', 'action' => 'delete', $friend['users']['id'])) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <br />
    <?php echo $this->Html->link('Add Friends', array('controller' => 'groups' ,'action' => 'find')) ?>
    <br />
    <?php echo $this->Html->link('See All Friends', array('controller' => 'groups', 'action' => 'index')) ?>
</div>

<div id="userBottom">
    <h3><?php echo $this->Html->link('Schedule', array('controller' => 'NewSchedules', 'action' => 'index')) ?></h3>
    
    <table>
        <th style="width: 100px">Monday</th>
        <th style="width: 100px">Tuesday</th>
        <th style="width: 100px">Wednesday</th>
        <th style="width: 100px">Thursday</th>
        <th style="width: 100px">Friday</th>
        
        <?php foreach($schedule as $schedule_item): ?>
            <tr style="text-align: center">
                <td><?php echo $schedule_item['NewSchedule']['day'] === 'Monday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : ''; ?></td>                
                <td><?php echo $schedule_item['NewSchedule']['day'] === 'Tuesday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : ''; ?></td>
                <td><?php echo $schedule_item['NewSchedule']['day'] === 'Wednesday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : ''; ?></td>
                <td><?php echo $schedule_item['NewSchedule']['day'] === 'Thursday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : ''; ?></td>
                <td><?php echo $schedule_item['NewSchedule']['day'] === 'Friday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : ''; ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <br />
    <?php echo $this->Html->link('Add New Schedule Item', array('controller' => 'NewSchedules', 'action' => 'add')) ?>    
    <!-- <?php echo $this->element('sql_dump'); ?> -->
</div>
