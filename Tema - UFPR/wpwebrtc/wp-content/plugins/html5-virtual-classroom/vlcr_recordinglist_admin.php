<?php
/**
 * virtual-classroom
 *
 *
 * @author   BrainCert
 * @category Recording List
 * @package  virtual-classroom
 * @since    1.7
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wp_enqueue_script('vlcr_script',VC_URL.'/js/vlcr_script.js');

echo '<h3>Recording List</h3>';

if(isset($_REQUEST['task'])){
	include_once('vlcr_action_task.php');	
}
$vc_obj = new vlcr_class();
$vc_setting=$vc_obj->vlcr_setting_check();
if($vlcr_setting==1){
    echo "Please setup API key and URL";
    return;
}
$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
$targetpage = "admin.php?page=".VC_FOLDER."/vlcr_setup.php/RecordingList";  	//your file name  (the name of this file)
$limit = 10; 								//how many items to show per page
$result=$vc_obj->vlcr_listrecording($search,$limit,$_REQUEST['cid']);
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
            <a class="button button-primary button-large" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ submitForm('adminForm','delete')}">Delete</a>
        </td>
    </tr>
    <tr>
    	<th><input type="checkbox" onclick="checkAll(this)" value="" name="checkall-toggle"></th>
    	<th>Record id</th>
        <th>File Name</th>
        <th>Date Created</th>
        <th>Action</th>
    </tr>
</thead>
<tfoot>   
    <tr>
        <td colspan="12">
		</td>
    </tr>
</tfoot>
<tbody>    
       <?php
       if($result && $result['Recording'] != 'No video recording available' && isset($result[0]['id'])){
		   foreach($result  as $i => $item)
		   { 
		   	if($item['id']){
            ?>
             <tr class="row<?php echo $i % 2; ?>">
                <td class="center">
                	<input type="checkbox" onclick="isChecked(this.checked);" value="<?php echo esc_html($item['id']); ?>" name="discountid[]" id="cb<?php echo $i?>">
                </td>
                 <td class="center">
                    <?php echo esc_html($item['id']); ?>
                </td>
                 <td class="center">
                     <?php if($item['fname']){echo esc_html($item['fname']);}else{echo esc_html($item['name']);} ?>
                </td>
                 
                <td class="center">
                  <?php echo esc_html($item['date_recorded']); ?>
                </td>
                
                 
                
                 <td class="center">
                      <div class="vc_tooltip">
                        <a href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/RecordingList&task=downloadRecord&tmpl=component&file='.$item['name'].''))?>" >
                         <i class="icon-download"></i>
                       </a>
                       <span class="vc_tooltiptext">Download Record file</span>
                       </div>

                                             
                      <div class="vc_tooltip">
                       <a href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/RecordingList&task=change_recording_status&tmpl=component&cid='.$_REQUEST['cid'].'&rid='.$item['id'].''))?>" >
                       <?php if($item['status'] == 0){?>
                        <i class="icon-circle-blank"></i>
                        <?php }else{?>
                        <i class="icon-ok"></i>
                        <?php } ?>
                       </a>
                       <?php if($item['status'] == 0){?>
                       <span class="vc_tooltiptext">Publish</span>
                       <?php }else{?>
                        <span class="vc_tooltiptext">Unpublish</span>
                        <?php } ?>
                        </div>



                       <div class="vc_tooltip">
                       <a href="<?php echo wp_nonce_url(admin_url('admin.php?page='.VC_FOLDER.'/vlcr_setup.php/RecordingList&task=remove_recording&tmpl=component&cid='.$_REQUEST['cid'].'&rid='.$item['id'].''))?>" class="">
                       <i class="icon-trash"></i>
                       </a>
                       <span class="vc_tooltiptext">Remove</span>
                       </div>



                </td>
                </tr>
			<?php  
			 } 
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
        window.location.href = 'admin.php?page=<?php echo VC_FOLDER;?>/vlcr_setup.php/RecordingList&cid=<?php echo $_REQUEST['cid'];?>';
    }
</script>