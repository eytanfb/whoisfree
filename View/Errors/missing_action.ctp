<h2>We are sorry but this page does not exist</h2>


<?php echo CakeSession::read("Auth.User.id") ? $this->Html->link('Back to Me', array('controller' => 'users', 'action' => 'view', CakeSession::read("Auth.User.id"))) 
    : $this->Html->link('Back to Home', array('controller' => 'pages', 'action' => 'display')) ?>