<h2>Add New Time</h2>
<?php date_default_timezone_set('America/Los_Angeles');  ?>
<div id="signupOrLoginBox" style="margin: 0px 0px 0px 0px">
<?php echo $this->Form->create('NewSchedule', array('action' => 'add'));?>
    <div class="row">
        <?php echo $this->Html->tag('label', 'Start Time:', array('class' => 'row')) ?>
        <?php echo $this->Form->input('start_time', array('class' => 'row', 'label' => false, 'type' => 'time', 'style' => 'width: 50px; float: left; position: relative', 'interval' => 30, 'timeformat' => 12)) ?>
    </div>
    <br />
    <div class="row">
        <?php echo $this->Html->tag('label', 'End Time:', array('class' => 'row')) ?>
        <?php echo $this->Form->input('end_time', array('class' => 'row', 'label' => false, 'type' => 'time', 'interval' => 30, 'timeformat' => 12, 'style' => 'width: 50px; float: left; position: relative;')) ?>
    </div>
    <br />    
    <div><?php echo $this->Form->input('day', array('options' => array('Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday'), 'selected' => date("l")))  ?></div>
    <br />
    <div><?php echo $this->Form->input('description', array('label' => 'Description', 'type' => 'text', 'class' => 'row')) ?></div>
    <br />
<?php echo $this->Form->end('Create New Time'); ?>
</div>