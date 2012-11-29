<div style="width: 60%; position: relative; float: left">    
    <h2>Group</h2>

    <table style="width: 600px">
        <th style="width: 200px">First Name</th>
        <th style="width: 200px">Last Name</th>
        <th style="width: 200px">Free?</th>
        
         <?php foreach($groups as $group): ?>
         <tr style="width: 600px; text-align: center">         
            <td style="width: 190px">
                <?php echo $this->Html->link($group['users']['first_name'], array('controller' => 'users', 'action' => 'view_friend', $group['users']['id']))  ?>
            </td>
            <td style="width: 190px">
                <?php echo $this->Html->link($group['users']['last_name'], array('controller' => 'users', 'action' => 'view_friend', $group['users']['id']))  ?>
            </td>
            <td style="width: 190px">
                <?php $random = rand(1,3); echo $this->requestAction('users/isFree/'.$group['users']['id']) ? $this->Html->image('im_free_'.$random.'.jpg', array('style' => 'width: 190px; height: 40px;')) 
         :  $this->Html->image('im_busy_'.$random.'.jpg', array('style' => 'width: 190px; height: 40px')) ?>
            </td>
         </tr>   
         <?php endforeach ?>
    </table>    
    <br />
    <br />    
    <?php echo $this->Html->link('Add Friends', array('action' => 'find')) ?>
    <br />
    <?php echo $this->Html->link('Back to Me', array('controller' => 'users', 'action' => 'view', CakeSession::read("Auth.User.id"))) ?>

</div>
<div style="position: relative; float: left; width: 25%;">    
    <?php $random = rand(1,12); echo $this->Html->image('random_images_'.$random.'.jpg', array('style' => 'margin-top: 50px; height: 450px; width: 450px')); ?>
</div>