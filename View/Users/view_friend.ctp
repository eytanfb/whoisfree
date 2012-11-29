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
                <td><?php echo $friend['users']['first_name'] ?></td>
                <td><?php echo $friend['users']['last_name'] ?></td>
                <td><?php echo $this->requestAction('users/isFree/'.$friend['users']['id']) ? 'Yes' : 'No' ?></td>                
            </tr>
        <?php endforeach ?>
    </table>    
</div>

<div id="userBottom">
    <h3>Schedule</h3>
    
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
    <!-- <?php echo $this->element('sql_dump'); ?> -->
</div>
