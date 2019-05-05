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

$vc_obj = new vlcr_class();
$vc_setting=$vc_obj->vlcr_setting_check();
if($vc_setting==1){
    echo "Please setup API key and URL";
    return;
}
$id=$_REQUEST['id'];
$result=$vc_obj->vlcr_instructorPreview($id);
$item=$result[0];
$current_user = wp_get_current_user();
$item['uuname']=$current_user->display_name;
$launchUrl=$vc_obj->vlcr_class_launch_btn($item);
	if($result[0]['status'] == "Upcoming"){
	    $class = "vc-alert vc-alert-warning";
	}
	if($result[0]['status'] == "Past"){
	     $class = "vc-alert vc-alert-danger";
	}
	if($result[0]['status'] == "Live"){
	    $class = "vc-alert vc-alert-success";
	}
//echo "<pre>";print_r($result);echo "</pre>";
?>
<div style="border-top: 1px solid #ccc; padding-top: 10px; margin-top:5px" class="l-preview">

<h2>Preview as Instructor</h2>
<div class="row">
	<div class="">
		<div style="float:left;margin-left:18px;"><strong><?php echo $result[0]['title']; ?></strong>  <div style="margin-top:20px;width:97%;" class="<?php echo $class;?> span12"><?php echo $result[0]['status']; ?></div></div>
	</div>
</div>
<div style="width:97%;" class="well col-md-8">
	<div style="margin-top:10px;">
		<h6><span style="color: rgb(173, 0, 87);">Date and Time:</span>  
		<?php if($result[0]['status'] =='Upcoming' && !empty($result[0]['class_next_date'])) { ?>
		<i class="icon icon-calendar"></i> <?php echo date('M j, Y', $result[0]['class_next_date']); 
		} else{ ?>	
		<i class="icon icon-calendar"></i>&nbsp;<?php echo date("M j, Y",strtotime($result[0]['date']));?>  
		<?php } ?>	
		<i class="icon icon-time"></i> <?php echo $result[0]['start_time']; ?> </h6>
	</div>
	<h6> 
		<span style="color: rgb(173, 0, 87);">Time Zone:</span> <?php echo $result[0]['timezone_label']; ?> 
	</h6>
	<h6> 
		<span style="color: rgb(173, 0, 87);">Duration:</span> <?php echo $result[0]['duration']/60; ?> minutes 
	</h6>
	<?php if($launchUrl){	?>
	<a target="_blank" class="btn btn-primary" style="font-weight: bold;" id="launch-btn" onclick="popup('<?php echo $launchUrl ?>'); return false;">Launch</a>
	<?php } ?>
	<!-- <h6> 
		<span style="color: rgb(173, 0, 87);">Datacenter Region:</span> <?php echo $result[0]['isRegion']; ?>
	</h6> -->
	
</div>
</div>


