<?php
/**
 * virtual-classroom
 *
 *
 * @author   BrainCert
 * @category Classlist
 * @package  virtual-classroom
 * @since    1.7
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wp_enqueue_script('vlcr_script',VC_URL.'/js/vlcr_script.js');
echo '<h3>Class List</h3>';

if(isset($_REQUEST['task'])){
	include_once('vlcr_action_task.php');	
}
global $wpdb,$key,$base_url;
$row = $wpdb->get_row(@$wpdb->prepare('SELECT * FROM '.$wpdb->prefix . 'virtualclassroom_settings'));


$vc_obj = new vlcr_class();
$vc_setting=$vc_obj->vlcr_setting_check();
if($vc_setting==1){
    echo "Please setup API key and URL";
    return;
}

$limit = 10;    

$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : ''; 

$result=$vc_obj->vlcr_listclass($search,$limit); 
$targetpage = "admin.php?page=".VC_FOLDER."/vlcr_setup.php/ClassList";    //your file name  (the name of this file)
$pagination = $vc_obj->vlcr_admin_pagination($targetpage,$result,$limit);
?>
<form id="searchForm" name="searchForm" method="post" action="">  

<table class="table">
    <thead><tr>
      <td width="100%">
            Filter:
            <input type="text" name="search" id="search" value="<?php echo $search;?>" class="text_area" title="Filter by Title">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Go"  />
            <input type="button" name="reset" id="reset" onclick="resetbtn();" class="button button-primary" value="Reset"  />
      </td>
    </tr>
  </thead></table>
</form> 

<form id="adminForm" name="adminForm" method="post">  
<table class="wp-list-table widefat striped">
<thead>
    <tr>
    	<td colspan="12">
        	<a class="button button-primary button-large" href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/ClassList&action=add'))?>">Add</a>
            <a class="button button-primary button-large" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ submitForm('adminForm','edit')}">Edit</a>
            <a class="button button-primary button-large" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ submitForm('adminForm','delete')}">Delete</a>
        </td>
    </tr>
    <tr>
    	<th><input type="checkbox" onclick="checkAll(this)" value="" name="checkall-toggle"></th>
    	<th>Class Id</th>
        <th>Class Title</th>
        <th>Date</th>
        <th>Start time</th>
        <th>End time</th>
        <th>End date</th>
        <th>Record</th>
        <th>Type</th>
        <th>Status</th>
        <th>Duration</th>
        <th>Option</th>
    </tr>
</thead>
<tfoot>   
    <tr>
        <td colspan="12">
        	<?php echo $pagination;	?>
		</td>
    </tr>
</tfoot>
<tbody>    
       <?php
	   if($result['classes']){
		   foreach($result['classes'] as $i => $item)
		   { 

            $class_id=$item['id'];
            ?>
             <tr class="row<?php echo $i % 2; ?>">
                <td class="center">
                	<input type="checkbox" onclick="isChecked(this.checked);" value="<?php echo esc_html($item['id']); ?>" name="cid[]" id="cb<?php echo $i?>">
                </td>
                 <td class="center">
                    <?php echo esc_html($item['id']); ?>
                </td>
                 <td class="center">
                 <?php 
                 $class_url = get_permalink($row->class_detail_page).'&pcid='.$class_id;
                 if(strpos(get_permalink($row->class_detail_page),'?')===false){
                    $class_url = get_permalink($row->class_detail_page).'?pcid='.$class_id;
                }

                 ?>
                    <a href="<?php echo $class_url;?>" target="_blank"><?php echo esc_html($item['title']) ; ?></a>
                </td>
                 <td class="center">
                    <?php echo esc_html($item['date']) ; ?>
                </td>
                <td class="center">
                    <?php echo esc_html($item['start_time']) ; ?>
                </td>
                <td class="center">
                    <?php echo esc_html($item['end_time']) ; ?>
                </td>
                <td class="center">
                    <?php echo esc_html($item['end_date']) ; ?>
                </td>
                <?php if($item['record'] == 1){
                      $record = "Yes";
                    }else{$record = "No";}?>
                 
                <td class="center">
                    <?php echo $record ; ?>
                </td>
                <td class="center">
                    <?php if($item['ispaid'] == 1){
                      $ispaid = "Paid";
                    }else{$ispaid = "Free";}?>
                    
                    <?php echo $ispaid ; ?>
                </td>
                <td class="center">
                    <?php echo esc_html($item['status']) ; ?>
                </td>
                <?php $duration = (int)($item['duration'] / 60); ?>
                 <td class="center">
                    <?php echo $duration . " Minutes"; ?>
                </td>
                <td class="center" style="overflow: visible;">
                <div class="dropdown">
                    
                    <a class="dropbtn" id="dropbtn" href="javascript:void(0);" onclick="dropdownmenu('<?php echo $item["id"]?>')" style="padding: 0 16px;"> <i class="icon icon-cog"></i> <b class="caret"></b> </a>
                
                <div class="dropdown-content" id="slide-gear-<?php echo $item['id']?>">
                <li>    
                <?php 
                 $learner_url = get_permalink($row->class_detail_page).'&islearner=1&pcid='.$class_id;
                 if(strpos(get_permalink($row->class_detail_page),'?')===false){
                    $learner_url = get_permalink($row->class_detail_page).'?islearner=1&pcid='.$class_id;
                }
                 ?>
                    <a target="_blank" alt="Click to see test detail" href="<?php echo $learner_url;?>"><i class="icon icon-eye-open"></i> Preview as Learner</a>
                    
                </li>
                <li>
                <?php 
                $instructor_url = get_permalink($row->class_detail_page).'&isinstructor=1&pcid='.$class_id;
                 if(strpos(get_permalink($row->class_detail_page),'?')===false){
                    $instructor_url = get_permalink($row->class_detail_page).'?isinstructor=1&pcid='.$class_id;
                }
                ?>
                    <a target="_blank" alt="Click to see test detail" href="<?php echo $instructor_url;?>"><i class="icon icon-eye-open"></i> Preview as Instructor</a>
                </li>
                <li>

                    <a href="<?php echo admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/attendancereport&id='.$item['id'])?>"><i class="icon icon-users"></i> Attendance report</a>
                </li>
               
                <li>
                    <a href="#" onclick="return confirm('Are you sure you want to cancel this class?')"><i class="icon icon-minus-circle"></i> Cancel class</a>
                </li>
                <li class="divider"></li>
                <li> 
                    <a href="<?php echo admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/inviteemail&id='.$item['id'])?>"> <i class="icon icon-envelope"></i> Invite by E-mail </a> 
                </li>
                <li> 
                    <a href="<?php echo admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/inviteusers&id='.$item['id'])?>"> <i class="icon icon-envelope"></i> Invite Users </a> 
                </li>
                
                <li> 
                    <a href="<?php echo admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/inviteusergroup&id='.$item['id'])?>"> <i class="icon icon-envelope"></i> Invite User Group </a> 
                </li>
                    <li class="divider"></li>
                    <?php if($item['ispaid']==1){ ?> 
                    <li>
                    <a href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/PriceList&cid='.$item['id'].''))?>" >
                    <i class="icon icon-shopping-cart"></i> Shopping Cart
                   <!--  <img src="<?php echo VC_URL?>/images/icon-shopping-cart.png" alt="Tooltip">  -->
                    </a>
                    </li>                    
                    <li>
                    <a href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/DiscountList&cid='.$item['id'].''))?>" >
                    <i class="icon icon-ticket"></i> Discounts
                    </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/ViewRecording&cid='.$item['id'].''))?>" >
                        <i class="icon icon-play-circle"></i>
                        View class Recording
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/RecordingList&cid='.$item['id'].''))?>" >
                        <i class="icon icon-play-circle"></i>
                        Manage Recording
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/Emailtemplate&cid='.$item['id'].''))?>" >
                        <i class="icon icon-envelope"></i>
                        Manage Email template
                        </a>
                    </li>
                </div></div>                    
                        </td>
                </tr>
			<?php  
			} // foeach
	   }?> 
</tbody>      
</table>
<input type="hidden" value="0" name="boxchecked">
<input type="hidden" name="task" value="" />
<input type="hidden" name="action" value="" />
</form>

<script type="text/javascript">
  function resetbtn(){
        document.getElementById('search').value=' '; 
        window.location.href = '<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/ClassList'))?>';
    }
  jQuery("a .icon.icon-cog").click(function(e){jQuery(this).parent().trigger('click');e.stopImmediatePropagation();});
function dropdownmenu(id) {
   if(jQuery("#slide-gear-"+id).hasClass('show')){
        jQuery("#slide-gear-"+id).removeClass('show');
    }else{
        jQuery(".dropdown-content").removeClass('show')
        jQuery("#slide-gear-"+id).addClass('show');

    }
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            jQuery(".dropdown-content").removeClass('show');
        }
    }
}
</script>
