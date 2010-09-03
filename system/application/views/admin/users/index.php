<div class="index">
    <div class="section">
        <div class="section-inner clearfix">
            <h2 class="grid_12"><?php echo 'User';?></h2>
            <div class="grid_4"> <?php echo anchor("admin/users/add","Add User",array('id'=>'add_type', 'title'=>'Add Type','class'=>'new')); ?></div>
        </div>
    </div>
<table class="list">
    <tr>
        <th>Id</th>
        <th>UserName</th>
        <th>Password</th>
        <th>Email</th>
        <th>Role</th>
        <th>Supervisor</th>
        <th class="actions">Action</th>
    </tr>

    <?php
    $i = 0;
    foreach($query as $user):
          $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
        }
                    ?>
    <tr<?php echo $class;?>>
        <td><?php echo $user->id?></td>
        <td><?php echo $user->username?></td>
        <td><?php echo $user->password?></td>
        <td><?php echo $user->email?></td>
        <td><?php echo $user->role?></td>
        <td><?php echo ($user->role=='staff'||$user->role=='supervisor')?$user->parent_username:''?></td>
        <td class="actions"><?php echo anchor("admin/users/edit/".$user->id,"Edit",array('id'=>'add_type', 'title'=>'Edit User')); ?>|
        <?php echo anchor("admin/users/delete/".$user->id,"Delete",array('id'=>'add_type', 'title'=>'Delete User')); ?></td>
    </tr>
    <?php endforeach;?>
</table>
</div>