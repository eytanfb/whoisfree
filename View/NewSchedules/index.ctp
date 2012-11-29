<h2>Schedules</h2>

<table style="width: 600px">
    <th style="width: 100px">Monday</th>
    <th style="width: 100px">Tuesday</th>
    <th style="width: 100px">Wednesday</th>
    <th style="width: 100px">Thursday</th>
    <th style="width: 100px">Friday</th>
    <th style="width: 100px"></th>
    
    <?php foreach($schedule as $schedule_item): ?>
        <tr style="text-align: center">
            <td><?php echo $schedule_item['NewSchedule']['day'] === 'Monday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : '' ?></td>                
            <td><?php echo $schedule_item['NewSchedule']['day'] === 'Tuesday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : '' ?></td>
            <td><?php echo $schedule_item['NewSchedule']['day'] === 'Wednesday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : '' ?></td>
            <td><?php echo $schedule_item['NewSchedule']['day'] === 'Thursday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : '' ?></td>
            <td><?php echo $schedule_item['NewSchedule']['day'] === 'Friday' ? $this->Time->format('H:i', $schedule_item['NewSchedule']['start_time']).'-'.$this->Time->format('H:i', $schedule_item['NewSchedule']['end_time']) : '' ?></td>
            <td><?php echo $this->Html->link('Delete', array('action' => 'delete', $schedule_item['NewSchedule']['id']))  ?></td>
        </tr>
    <?php endforeach ?>
</table>
<br />
<?php echo $this->Html->link('Add New Schedule Item', array('controller' => 'NewSchedules', 'action' => 'add')) ?>  
<br />
<?php echo $this->Html->link('Back to Me', array('controller' => 'users', 'action' => 'view', CakeSession::read("Auth.User.id"))) ?>
