<div class="types form">
    <?php echo form_open("admin/typeofleaves/add",array('id'=>'formleave'));?>
    <fieldset>
        <legend><?php echo 'Tambah Type'; ?></legend>
        <div class="input text">
            <label>Name: * </label>
            <?php echo form_input(array('id'=>'name','name'=>'name'));?>
            <span id="error_name"></span>
        </div>
        <div class="input submit">
            <?php echo form_submit('simpan','Simpan');?>
        </div>        
    </fieldset>
    <?php

    echo form_close();?>
</div>
<script type="text/javascript">
    $('#formleave').submit(function(){
        if($('#name').val()==''){
            $('#error_name').html('<i>Must be filled</i>');
            return false;
        }

    });

</script>