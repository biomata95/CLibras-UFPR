<?php
/**
 * virtual-classroom
 *
 *
 * @author   BrainCert
 * @category Price Listing
 * @package  virtual-classroom
 * @since    1.7
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wp_enqueue_script('vlcr_script',VC_URL.'/js/vlcr_script.js');

echo '<h3>Price List</h3>';

if(isset($_REQUEST['task'])){
	include_once('vlcr_action_task.php');	
}
$vc_obj = new vlcr_class();

$vc_setting=$vc_obj->vlcr_setting_check();
if($vc_setting==1){
    echo "Please setup API key and URL";
    return;
}
$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '' ;
$limit = 10; 								//how many items to show per page
$result=$vc_obj->vlcr_listprice($search,$limit,$_REQUEST['id']);

$submenu_base_url = get_permalink($post->ID).'&id='.$_REQUEST['id'].'&type=pricelist&action=add';
if(strpos(get_permalink($post->ID),'?')===false){
    $submenu_base_url = get_permalink($post->ID).'?id='.$_REQUEST['id'].'&type=pricelist&action=add';
}
?>
<form id="adminForm" name="adminForm" method="post" action="">    	 
<button class="button button-primary button-large" href="<?php echo wp_nonce_url($submenu_base_url)?>">Add</button>
            <button class="button button-primary button-large" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ submitForm('adminForm','edit')}">Edit</button>
            <button class="button button-primary button-large" onclick="if (document.adminForm.boxchecked.value==0){alert('Please first make a selection from the list');}else{ submitForm('adminForm','delete')}">Delete</button>
<table class="wp-list-table widefat striped" style="margin-top: 20px;">
<thead>
    <tr>
    	<th style="width: 5%;"><input type="checkbox" onclick="checkAll(this)" value="" name="checkall-toggle"></th>
    	<th style="width: 15%;">Price id</th>
        <th style="width: 10%;">Price</th>
        <th style="width: 20%;">Scheme days</th>
        <th style="width: 15%;">Lifetime</th>
        <th style="width: 15%;">Times</th>
        <th style="width: 20%;">Numbertimes</th>
    </tr>
</thead>
<tbody>    
       <?php
       if($result &&  @$result['Price'] != 'No Price in this Class'){
		   foreach($result  as $i => $item)
		   { 
		 
            ?>
             <tr class="row<?php echo $i % 2; ?>">
                <td class="center">
                	<input type="checkbox" onclick="isChecked(this.checked);" value="<?php echo esc_html($item['id']); ?>" name="priceid[]" id="cb<?php echo $i?>">
                </td>
                 <td class="center">
                    <?php echo esc_html($item['id']); ?>
                </td>
                 <td class="center">
                     <?php echo esc_html($item['scheme_price']); ?>
                </td>
                 
                <td class="center">
                   <?php echo esc_html($item['scheme_days']) ; ?>
                </td>
                <td class="center">
                    <?php
                                    if ($item['lifetime'] == "1") {
                                        echo "Unlimited";
                                    } elseif ($item['lifetime'] == "0") {
                                        echo "Fix Day";
                                    }
                                    ?>
                </td>
                
                <td class="center">
                     <?php if($item['times'] == 0){
                           $times = "unlimited";
                        }
                        if($item['times'] == 1){
                           $times = "limited";
                        }
                        ?>
                        <?php echo $times; ?>
                </td>
                <td class="center">
                    <?php echo esc_html($item['numbertimes']) ; ?>
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