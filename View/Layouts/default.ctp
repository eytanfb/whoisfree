<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <meta name="description" content="" />
        <meta name="author" content="Eytan Anjel" />

        <title><?php echo $title_for_layout ?></title>
        <?php 
            echo $this->Html->css('Site');
            echo $scripts_for_layout;
        ?>
    </head>

    <body>
        <div id="mainDiv">
            <?php echo $this->Session->flash(); ?>
            <div id="header">
                <?php echo $this->Html->image('connect.jpg', array('alt' => 'My Image', 'id' => 'headerImage')) ?>
                <div id="headerNavMenu">
                    <div name="navTab" class="menuTab">
                        <?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'Home'), array('class' => 'tabName' )) ?>
                    </div>                   
                </div>
                <div id="login">
                    <?php echo $this->Html->link('login', array('controller' => 'users', 'action' => 'login')) ?>
                    <?php echo $this->Html->link('signup', array('controller' => 'users', 'action' => 'signup')) ?>
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

