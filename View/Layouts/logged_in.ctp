<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <meta name="description" content="" />
        <meta name="author" content="Eytan Anjel" />

        <title><?php echo $this->fetch('title') ?></title>
        <?php 
            echo $this->Html->css('Site');
            echo $this->Html->script('jquery.tablescroll');
        ?>
    </head>

    <body>
        <div id="mainDiv">
            <div id="header">
                <?php echo $this->Html->image('connect.jpg', array('alt' => 'My Image', 'id' => 'headerImage')) ?>
                <div id="headerNavMenu">
                    <div name="navTab" class="menuTab">
                        <?php echo $this->Html->link('Me', array('controller' => 'users', 'action' => 'view', CakeSession::read("Auth.User.id")), array('class' => 'tabName')) ?>                        
                    </div>
                    <!-- <div name="navTab" class="menuTab">
                        <?php echo $this->Html->link('My Schedule', array('controller' => 'newSchedules', 'action' => 'index'), array('class' => 'tabName')) ?>
                    </div> -->
                    <div name="navTab" class="menuTab">
                        <?php echo $this->Html->link('My Group', array('controller' => 'groups', 'action' => 'index'), array('class' => 'tabName')) ?>
                    </div>
                    <!-- <div name="navTab" class="menuTab">
                        <a href="#" class="tabName">Settings</a>
                    </div> -->
                </div>
                <div id="login">
                    <?php echo CakeSession::read("Auth.User.first_name").' '.CakeSession::read("Auth.User.last_name").' '  ?>
                    <br />
                    <?php echo $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout')) ?>
                </div>
            </div>
            <div id="mainContent">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $this->fetch('content') ?>
            </div>
        </div>
    </body>
</html>

