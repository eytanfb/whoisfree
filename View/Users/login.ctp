<div id="signupOrLoginBox">
<br />
<?php echo $this->Form->create('User', array('action' => 'login'));?> 
        <?php echo $this->Html->tag('label', 'Email: ', array('class' => 'row')) ?>
        <?php echo $this->Form->text('email');?> 
        <?php echo $this->Html->tag('label', 'Password: ', array('class' => 'row')) ?>
        <?php echo $this->Form->password('password');?>  
<?php echo $this->Form->end('login'); ?>
</div> <!-- End of login Box -->