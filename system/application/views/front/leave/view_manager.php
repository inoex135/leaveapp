<div class="leaves view">
    <h2>Leave Application</h2>
    <dl>
        <dt class="altrow">Staff:</dt>
        <dd class="altrow"><? echo $leave['username'];?></dd>
        <dt class="altrow">Type:</dt>
        <dd class="altrow"><? echo $leave['name'];?></dd>
        <dt class="altrow">Duration:</dt>
        <dd class="altrow"><? echo $leave['start_date'].' until '.$leave['end_date'];?></dd>
        <dt class="altrow">Purpose:</dt>
        <dd class="altrow"><? echo $leave['purpose'];?></dd>
        <dt class="altrow">Status:</dt>
        <dd class="altrow"><? echo $leave['status_label'];?></dd>
        <dt class="altrow">Submit Time:</dt>
        <dd class="altrow"><? echo $leave['submit_time'];?></dd>
        <dt class="altrow">Recommendation Time:</dt>
        <dd class="altrow"><? echo $leave['recommend_time'];?></dd>
        <dt class="altrow">Approve Time:</dt>
        <dd class="altrow"><? echo $leave['approve_time'];?></dd>
        <dt class="altrow">Keep Time:</dt>
        <dd class="altrow"><? echo $leave['keep_time'];?></dd>
        <dt class="altrow">Recommendation:</dt>
        <dd class="altrow"><? echo $leave['recommendation'];?></dd>
    <?
    if($leave['status'] == SUBMITTED) {
        echo form_open("front/leave/approve",array('class'=>'yform columnar', 'id'=>'formaprove'));
        ?>
    <fieldset>
        <legend><?php echo 'Approve'; ?></legend>
        <div class='type-text'>
                <?php echo form_hidden('id',$id); ?>
            <label>Manager Note</label>
                <?php echo form_textarea(array('name'=>'manager_note','id'=>'manager_note'),$manager_note); ?>
            <label>Action</label>
                <?php echo form_dropdown('action',array(APPROVED=>'Approve',REJECTED=>'Reject')); ?>
        </div>
        <label>&nbsp;</label>
        <div class="submit">
                <?php echo form_submit('confirmApprove','Submit');?>
        </div>
    </fieldset>
        <?
        echo form_close();
    } else { ?>
        <dt class="altrow">Manager Note:</dt>
        <dd class="altrow"><? echo $leave['manager_note'];?></dd>
    </dl>
        <?}?>
</div>