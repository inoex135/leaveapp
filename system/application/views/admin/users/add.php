<div class="users form">
    <?php echo form_open("admin/users/add",array('class'=>'yform columnar', 'id'=>'formleave'));?>
    <fieldset>
        <legend><?php echo 'Add User'; ?></legend>
        <div class='type text'>
            <?php
            $options = array(
                    'admin'  => 'admin',
                    'staff'    => 'staff',
                    'supervisor'   => 'supervisor',
                    'manager' => 'manager',
                    'hr'=>'hr'
            );

            ?>
            <label>Username</label>
            <?php echo form_input(array('id'=>'username', 'name'=>'username')); ?>
            <span id="error_name"></span>
            <label>Password</label>
            <?php echo form_input(array('type'=>'password','id'=>'password','name'=>'password')); ?>
            <span id="error_name2"></span>
            <label>Email</label>
            <?php echo form_input(array('id'=>'email', 'name'=>'email')); ?>
            <span id="error_name3"></span>
            <label>Role</label>
            <?php echo form_dropdown('role', $options, 'admin','onchange=getParentOptions(this.value)'); ?>
        </div>
        <div class="input select">
            <label id="parent_label"></label>
            <span id="parent_options">

            </span>
        </div>
        <label>&nbsp;</label>
        <div class="submit">
            <?php echo form_submit(null,'Submit');?>
        </div>

    </fieldset>
    <?php

    echo form_close();?>
</div>
<script type="text/javascript">
    $('#formleave').submit(function(){
        if($('#username').val()==''){
            $('#error_name').html('<i>Must be filled</i>');
            return false;
        }
        if($('#password').val()==''){
            $('#error_name2').html('<i>Must be filled</i>');
            return false;
        }
        if($('#email').val()==''){
            $('#error_name3').html('<i>Must be filled</i>');
            return false;
        }

    });

    function getParentOptions($role){
        if($role=='staff'){
            $('#parent_label').html('Supervisor');
            $.get('<?php echo site_url('admin/users/getParentOptions/staff')?>', function(data) {
                $('#parent_options').html(data);
            });

        }
        else if($role=='supervisor'){
            $('#parent_label').html('Manager');
            $.get('<?php echo site_url('admin/users/getParentOptions/supervisor')?>', function(data) {
                $('#parent_options').html(data);
            });
        }
        else{           
            $('#parent_label').html('');
            $('#parent_options').html('');
        }
    }
</script>


