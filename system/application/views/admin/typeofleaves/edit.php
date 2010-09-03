

<div class="types form">
    <?php echo form_open("admin/typeofleaves/edit",array('id'=>'formleave'));?>
    <fieldset>
        <legend><?php echo 'Edit Type'; ?></legend>
        <?php $this->table->add_row("", form_hidden(array('id'=>$name->id))); ?>
        <?php $this->table->add_row("Name :", form_input(array('id'=>'name','name'=>'name', 'value'=>$name->name))); ?>
        <span id="error_name"></span>
        <div class="submit">
            <?php $this->table->add_row(form_submit('simpan','Simpan'));?>
        </div>
        <?php echo $this->table->generate();?>
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


