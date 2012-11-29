<h2> Signup </h2>

<div id="signupOrLoginBox" style="margin-left: 0px; border: 0px; margin-top:0px;">
<br />
    <?php echo $this->Form->create('User', array('action' => 'signup')) ?>
        <?php echo $this->Html->tag('label', 'First Name: ', array('class' => 'row')) ?>
        <?php echo $this->Form->input('first_name'); ?>
        <?php echo $this->Html->tag('label', 'Last Name: ', array('class' => 'row')) ?>
        <?php echo $this->Form->input('last_name'); ?>
        <?php echo $this->Html->tag('label', 'Email: ', array('class' => 'row')) ?>
        <?php echo $this->Form->input('email'); ?>
        <?php echo $this->Html->tag('label', 'Password: ', array('class' => 'row')) ?>
        <?php echo $this->Form->password('password'); ?>
    <?php echo $this->Form->end('Sign Up') ?>
</div> <!-- End of signup box -->