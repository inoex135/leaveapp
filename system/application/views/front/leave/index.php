<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>js/jquery-autocomplete/jquery.autocomplete.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-autocomplete/jquery.autocomplete.js"></script>
<div class="section"><div class="section-inner clearfix">

    <h2 class="grid_12">Leave Application</h2>
    <div class="grid_4"><?  if(isset($isStaff)) echo anchor('front/leave/add', 'Add Application',array('class'=>'new')); ?></div>
</div></div>


<br>
<?php if($role!='staff'):?>
<form id="filter" action="">
    <div class="input text">
        <label></label>
        <input type="text" id="keyword_username" />
    </div>
    <div class="input submit">
        <input type="submit" value="Search"/>
    </div>
</form>
<?php endif;?>
<div id="data">
    <? echo $table; ?>
</div>
<script type="text/javascript">
    $('#filter').submit(function(){            
            $.get('<?php echo site_url('front/leave/index/')?>' +'/' + $('#keyword_username').val() + '/'+1, function(data) {
                $('#data').html(data);
            });        
        return false;
    });
    $(document).ready(function(){
        var users = '';
        $.get('<?php echo site_url('front/leave/ajax_listuser')?>', function(data) {
                $("#keyword_username").autocomplete(data.split(' '));
            });
        
    });

</script>