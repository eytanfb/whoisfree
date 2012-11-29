<h2>Users</h2>

<table>
    <th>
        First Name
    </th>
    <th>
        Last Name
    </th>
    <?php foreach($users as $user):  ?>
        <tr>
            <td>
                <?php echo $this->Html->link($user['User']['first_name'], array('action' => 'view', $user['User']['id'])) ?>
            </td>
            <td>
                <?php echo $user['User']['last_name']; ?>
            </td>
            <td>
                <?php echo $this->Html->link('Delete', array('action' => 'delete', $user['User']['id']), NULL, 'Are you sure you want to delete this user?'); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p><?php echo $this->Html->link('Add User', array('action' => 'signup')) ?></p>