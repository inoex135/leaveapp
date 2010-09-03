<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/ui-lightness/jquery-ui-1.8.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui-1.8.2.custom.min.js"></script>
<div class="leaves form">
    <?php echo form_open("front/leave/hredit",array('class'=>'yform columnar', 'id'=>'formleave'));?>
    <fieldset>
        <legend><?php echo 'Update Leave Application'; ?></legend>
        <div class='type-text'>
            <?php echo form_hidden('id',$leave->id); ?>
            <?php echo form_hidden('user_id',$leave->user_id); ?>
            <label>Type of Leave</label>
            <?php echo form_dropdown('type_of_leave_id', $typeofleaves,$leave->type_of_leave_id); ?>
            <label>Duration</label>
            <?php echo form_input(array('class'=>'w8em','name'=>'start_date','id'=>'start_date','value'=>$leave->start_date),'','readonly'); ?>
            -
            <?php echo form_input(array('class'=>'w8em','name'=>'end_date','id'=>'end_date','value'=>$leave->end_date),'','readonly'); ?>
            <span id="error_end"></span>
            <label>Purpose</label>
            <?php echo form_textarea(array('name'=>'purpose','id'=>'purpose','value'=>$leave->purpose)); ?>
            <span id="error_purpose"></span>
             <div class="input text">
                <label>Recommendation</label>
                <?php echo form_textarea(array('name'=>'recommendation','value'=>$leave->recommendation));?>
            </div>
            <div class="input text">
                <label>Manager's Note</label>
                <?php echo form_textarea(array('name'=>'manager_note','value'=>$leave->manager_note));?>
            </div>
            <div class="input select">
                <label>Status</label>
                <?php echo form_dropdown('status',$statuses,$leave->status);?>
            </div>
        </div>
        <label>&nbsp;</label>
        <div class="submit">
            <?php echo form_submit('','Submit');?>
        </div>

    </fieldset>
    <?php

    echo form_close();?>
</div>
<script type="text/javascript">
    $('#formleave').submit(function(){
        //        $('#error_start').html('');
        //        $('#error_end').html('');
        //        $('#error_purpose').html('');
        if($.trim($('#start_date').val())==''){
            $('#error_start').html('<i>Must be filled</i>');
            return false;
        }
        if($.trim($('#end_date').val())==''){
            $('#error_end').html('<i>Must be filled</i>');
            return false;
        }
        if($.trim($('#purpose').val())==''){
            $('#error_purpose').html('<i>Must be filled</i>');
            return false;
        }
        var startDate = new Date($('#start_date').val().replace("-", "/", "g"));
        var endDate = new Date($('#end_date').val().replace("-", "/", "g"));
        if (startDate > endDate){
            $('#error_start').html('<i>Start Date must be before or equal End Date</i>');
            return false;
        }

    });
    $(function() {
        $("#start_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
        $("#end_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });
</script>