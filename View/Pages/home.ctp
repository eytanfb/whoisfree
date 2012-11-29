<?php echo $this->Html->div(null, null, array('id' => 'topColumn')) ?>
    <?php echo $this->Html->div('welcomePicture') ?>
    <?php echo $this->Html->image('Campus_Center_Empty.jpg', array('alt' => 'Campus Center Empty', 'id' => 'welcomePhoto' )) ?>
    <?php echo $this->Html->tag("label", "Is Really Nobody Out Of Class?", array('id' => 'welcomeLabel')) ?>
</div><!-- end of welcome picture -->
    <?php echo $this->Html->div(null, "You know when you get out of class and look for friends at the Campus Center and don't see anybody, 
you just say \"Ah, so everybody is in class\". Well this is actually what goes on. 
And you don't know about it.", array('id' => 'description')) ?>
    <?php echo $this->Html->div('welcomePicture', null, array('style' => 'float: right;')) ?>
    <?php echo $this->Html->image('ccFull.jpg', array('alt' => 'Campus Center Full', 'id' => 'welcomePhoto','style' => 'float: right;')) ?>
</div><!-- end of welcome picture -->
</div><!-- end of left column -->
<?php echo $this->Html->div(null, null, array('id' => 'bottomColumn'))  ?>
<?php echo $this->Html->tag('span', 'Well this all ends NOW!', array('style' => 'color: #FFD700')) ?>
<?php echo $this->Html->tag('p', 'Signup Below and see Who Is Free?', array('style' => 'color: #FFD700')) ?>

<!--<?php echo $this->Html->div(null, null, array('id' => 'signupBox')) ?>-->
<div id="signupOrLoginBox">
<br />
<?php echo $this->Form->create('User', array('action' => 'signup')) ?>
    <?php echo $this->Html->tag('label', 'First Name: ', array('class' => 'row')) ?>
    <?php echo $this->Form->input('first_name', array('label' => '')); ?>
    <?php echo $this->Html->tag('label', 'Last Name: ', array('class' => 'row')) ?>
    <?php echo $this->Form->input('last_name', array('label' => '')); ?>
    <?php echo $this->Html->tag('label', 'Email: ', array('class' => 'row')) ?>
    <?php echo $this->Form->input('email', array('label' => '')); ?>
    <?php echo $this->Html->tag('label', 'Password: ', array('class' => 'row')) ?>
    <?php echo $this->Form->password('password'); ?>
<?php echo $this->Form->end('Sign Up') ?>
</div> <!-- End of signup box -->

<div id="signupOrLoginBox">
<br />
<?php echo $this->Form->create('User', array('action' => 'login'));?> 
        <?php echo $this->Html->tag('label', 'Email: ', array('class' => 'row')) ?>
        <?php echo $this->Form->text('email');?> 
        <?php echo $this->Html->tag('label', 'Password: ', array('class' => 'row')) ?>
        <?php echo $this->Form->password('password');?>
<?php echo $this->Form->end('Login'); ?>
</div> <!-- End of login Box -->