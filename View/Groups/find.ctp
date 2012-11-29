<h2>Find Friends</h2>

<?php echo $this->Form->create('group', array('action' => 'find')) ?>
    <?php echo $this->Form->input('first_name', array('label' => 'First Name: ')) ?>
    <?php echo $this->Form->input('last_name', array('label' => 'Last Name: ')) ?>
<?php echo $this->Form->end('Find') ?>

<br />
<br />
<br />
<br />
<table style="background-color: white; color: black;">

    <?php echo $this->Html->tableHeaders(array('First Name', 'Last Name', 'Add?')) ?>
    <?php foreach($friends as $friend): ?>
    <tr style="text-align: center">
        <td>
            <?php echo $friend['User']['first_name']; ?>
        </td>
        <td>
            <?php echo $friend['User']['last_name']; ?>
        </td>
        <td>
            <?php  echo $this->Html->link('Add Friend', array('action' => 'add', $friend['User']['id']), array('style' => 'color: black')); ?>                                    
        </td>
    </tr>
    <?php endforeach ?>
<!--     <?php echo $this->element('sql_dump'); ?> -->
</table>