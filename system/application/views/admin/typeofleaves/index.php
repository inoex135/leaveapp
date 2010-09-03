<div class="index">
    <div class="section">
        <div class="section-inner clearfix">
            <h2 class="grid_12"><?php echo 'TypeOfLeave';?></h2>
            <div class="grid_4"> <?php echo anchor("admin/typeofleaves/add","Add",array('id'=>'add_type', 'title'=>'Add Type')); ?></div>
        </div>
    </div>
<table class="list">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th class="actions">Action</th>
    </tr>

    <?php
    $i = 0;
    foreach($query as $type):
          $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
        }
                    ?>
    <tr<?php echo $class;?>>
        <td><?php echo $type->id?></td>
        <td><?php echo $type->name?></td>
        <td class="actions"><?php echo anchor("admin/typeofleaves/edit/".$type->id,"Edit",array('id'=>'add_type', 'title'=>'Edit Type')); ?>|
        <?php echo anchor("admin/typeofleaves/delete/".$type->id,"Delete",array('id'=>'add_type', 'title'=>'Delete Type')); ?></td>
    </tr>
    <?php endforeach;?>
</table>
</div>