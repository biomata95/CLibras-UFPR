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
global $wpdb;
$row = $wpdb->get_row(@$wpdb->prepare('SELECT * FROM '.$wpdb->prefix . 'virtualclassroom_settings'));
if(!$row)
{
echo "Please setup API key and URL";
return;
}
global $post;
//wp_enqueue_script('vlcr_script',VC_URL.'js/countdown.js');
//wp_enqueue_style( 'vlcr_jquery-ui', VC_URL.'/css/vlcr_jquery-ui.css');
//wp_enqueue_script('vlcr_jquery',VC_URL.'/js/vlcr_jquery-ui.js');
wp_enqueue_script('vlcr_script',VC_URL.'/js/vlcr_script.js');
wp_enqueue_script('vlcr_video',VC_URL.'/js/vlcr_video.js');

$current_user = wp_get_current_user();
$login_user_email = esc_html( $current_user->user_email );

$ogurl = get_permalink($post->ID).'&pcid='.$_REQUEST['pcid'];
if(strpos(get_permalink($post->ID),'?')===false){
    $ogurl = get_permalink($post->ID).'?pcid='.$_REQUEST['pcid'];
}

$islearner = $_REQUEST['islearner'];
$isinstructor = $_REQUEST['isinstructor'];

$task = $_REQUEST['task'];
$key = $row->braincert_api_key;
$base_url = $row->braincert_base_url;

$explode_base_url = explode('/',$base_url);
array_pop($explode_base_url);
$braincert_base_url = implode('/', $explode_base_url); 

$id=$_REQUEST['pcid'];

if($task == "returnpayment"){
    $qry="INSERT INTO ".$wpdb->prefix."virtualclassroom_purchase (class_id,  mc_gross, payer_id,payment_mode,date_puchased) VALUES ('".sanitize_text_field($_REQUEST['class_id'])."','".sanitize_text_field($_REQUEST['amount'])."','".get_current_user_id()."','".sanitize_text_field($_REQUEST['payment_mode'])."',now())";
    $wpdb->query(@$wpdb->prepare($qry));
    header('Location:'.$ogurl);
}

$result=$vc_obj->vlcr_learnerPreview($id);
$pricelist=$vc_obj->vlcr_get_priceList($id);
$paymentInfo=$vc_obj->vlcr_get_paymentInfo();
$getplan=$vc_obj->vlcr_getplan();
$login_user_group_classes=$vc_obj->vlcr_get_loginusergroup();

if($task=="class_checkout"){
    $vc_obj->vlcr_get_class_checkout();
}
if($task=="vlcr_view_class_recording"){
    $vc_obj->vlcr_view_class_recording();
}



	if($result[0]['status'] == "Upcoming"){
	    $class = "vc-alert vc-alert-warning";
	}
	if($result[0]['status'] == "Past"){
	     $class = "vc-alert vc-alert-danger";
	}
	if($result[0]['status'] == "Live"){
	    $class = "vc-alert vc-alert-success";
	}
$currencysym='';
switch(strtoupper($result[0]['currency'])){
    case "GBP":
        $currencysym = "£";
    break;
    case "CAD":
        $currencysym = "$";
    break;
    case "AUD":
        $currencysym = "$";
    break;
    case "EUR":
        $currencysym = "€";
    break;
    case "INR":
        $currencysym = "₹";
    break;
    default:
        $currencysym = '$';     

}
 ?>
<div id="modal-content-buying" class="modal">
	<?php if(isset($pricelist['Price']) && $pricelist['Price']=="No Price in this Class"){ ?>
        <div class="modal-content" style="overflow: hidden;">
        <span><b>Buying Option</b></span>
        <span class="close">&times;</span>
		<?php echo $pricelist['Price'];?>
        </div>
	<?php }else{?>
    
    <div class="modal-content" style="overflow: hidden;">
    <span><b>Buying Option</b></span>
    <span class="close">&times;</span>

     <div class="card_error" style="display: none;color: #a94442;background-color: #f2dede;border-color: #ebccd1;border-radius: 5px;margin-bottom: 10px;padding: 8px;"></div>
     <table class="table table-bordered" id="cartcontainer">
            <thead class="alert alert-info">
                <tr class="success">
                    <th style="width: 40px;">#</th>
                    <th>Price($)</th>
                    <th>Duration</th>
                    <th>Access Type</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $xx = 0;
                foreach($pricelist as $i=>$value) {

                    $price = $value['scheme_price'];

                    $option_id = $value['id'];
                    $subprice = $price;
                    $subpricebeforecoupondiscount =$price;
                    $chk_price = '<span id="displayprice'.$xx.'">'.$currencysym.' '.number_format($price, 2).'</span>';
                    
                    
                    $duration = ($value['lifetime']=='1') ? "Unlimited" : $value['scheme_days'].($value['scheme_days']>1 ? " days" : " day");
                    $dur = ($value['lifetime']=='1') ? 9999 : $value['scheme_days'];
                    $times = ($value['times']==0) ? "Unlimited" : $value['numbertimes'].($value['numbertimes']>1 ? " times" : " time");  
                    $tms = ($value['times']==0) ? -1 : $value['numbertimes'];

            ?>
                <tr class="warning">
                <td>
                <input type="hidden" id="subpricebeforecoupondiscount<?php echo $xx;?>" value="<?php echo $subpricebeforecoupondiscount; ?>" />
                <input type="hidden" id="originalprice<?php echo $xx;?>" value="<?php echo  $price; ?>" />
                    <input type="radio" name="pricescheme" id="pricescheme<?php echo $xx;?>" value="<?php echo $subprice; ?>" duration="<?php echo $dur; ?>" times="<?php echo $tms; ?>" option_id="<?php echo $option_id; ?>"/></td>
                    <td><?php echo $chk_price; ?></td>
                    <td><?php echo $duration; ?></td>
                    <td><?php echo $times; ?></td>
                </tr>
                <?php if($xx==0){?> 
                <script>
                jQuery(document).ready(function () {
                    jQuery("#pricescheme<?php echo $xx;?>").trigger("click");
                });
                </script>
                <?php }?>
            <?php

            $xx++;
                }
            ?>
            </tbody>
        </table>
        
         <div id="paymentcontainer">
         <?php
            if ($paymentInfo['type'] == '1') {
        ?>
        <div class="row">
            <div class="span5">
                <fieldset>
                    <p style="display:none" class="alert payment-message"></p>
                    <input type="hidden" name="access_token" id="access_token" value="<?=$paymentInfo['access_token']?>">
                    <input type="hidden" name="item_number" id="item_number" value="">
                    <div class="control-group">
                        <label style="width: 140px; padding-top: 5px; float: left; text-align: right;">Cardholder Name</label>
                        <div style="margin-left: 160px;">
                            <input type="text" tabindex="4" class="required" name="full_name" id="full_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label style="width: 140px; padding-top: 5px; float: left; text-align: right;">Card Number &amp; CCV</label>
                        <div style="margin-left: 160px;">
               <input type="text" tabindex="5" name="card-number" class="card-number stripe-sensitive required" autocomplete="off" style="width: 130px;" maxlength="16">
               <input type="text" tabindex="6" name="card-cvc" class="card-cvc stripe-sensitive required" autocomplete="off" style="width: 50px;" maxlength="16">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                    <div class="control-group">
                        <label style="width: 140px; padding-top: 5px; float: left; text-align: right;">Expiration Date</label>
                        <div style="margin-left: 160px;">
                            <select tabindex="7" class="card-expiry-month stripe-sensitive required" style="width: 60px;">
                                <option selected="" value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
                            <span> / </span>
                            <select tabindex="8" name="card-expiry-year" class="card-expiry-year stripe-sensitive required" style="width: 80px;"><option selected="" value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option></select>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="span3 helptext">
                <p>Your payment information is encrypted and securely processed by <a href="https://stripe.com" target="_blank" class="stripe">Stripe</a>.</p>
                <p><img alt="Uses Secure SSL Technology" src="https://drpyjw32lhcoa.cloudfront.net/9d61ecb/img/lock.png"><img alt="We accept Visa, Mastercard, Discover, and American Express" src="https://drpyjw32lhcoa.cloudfront.net/9d61ecb/img/cards.png">
            </p></div>
        </div>
        <?php  } else {    ?>

        <img src="<?php echo VC_URL?>/images/secured-by-paypal.jpg" /> 

        <?php  }  ?>
        </div>
   
   
    <input type="hidden" name="class_final_amount" id="class_final_amount" value="">
    <input type="hidden" name="class_price_id" id="class_price_id" value="">
    <h5 style="float: left;font-size: 20px;line-height: 35px;margin: 0;">Subtotal:&nbsp;&nbsp;</h5><div style="float: left;margin-top:4px;font-color:blue;" id="subvalue"></div>
       <div id="btncontainer" style="float: right;"> <button id="btnCheckout" class="btn btn-primary">Buy Class</button>
    </div><div id="txtprocessing" style="display:none;float: right;">Processing... Don't close.</div>  
    <p></p>  
    </div>
    <?php } ?>
</div>
<script src="https://www.paypalobjects.com/js/external/dg.js" type="text/javascript"></script>
<?php 
    if(strpos($base_url, 'braincert.org') !== false) {
        $paypalurl = 'https://www.sandbox.paypal.com/webapps/adaptivepayment/flow/pay';
    } else {
        $paypalurl = 'https://www.paypal.com/webapps/adaptivepayment/flow/pay';
    }

   // $paypalurl = 'https://www.sandbox.paypal.com/webapps/adaptivepayment/flow/pay';
    //$paypalurl = 'https://www.paypal.com/webapps/adaptivepayment/flow/pay';
?>
<form action="<?php echo $paypalurl;?>" target="PPDGFrame" class="standard" >
<input type="image" id="submitBtn" value="Pay with PayPal" style="display: none;">
<input id="type" type="hidden" name="expType" value="lightbox">
<input id="paykey" type="hidden" name="paykey" value="">
</form>
<script type="text/javascript" charset="utf-8">
var embeddedPPFlow = new PAYPAL.apps.DGFlow({trigger: 'submitBtn'});
if (window != top) {  
top.location.replace(document.location); 
}  
embeddedPPFlow = top.embeddedPPFlow || top.opener.top.embeddedPPFlow;
embeddedPPFlow.closeFlow();
</script>
<style type="text/css">
	.ui-widget.ui-widget-content{
		position: fixed !important;
		top:5% !important;;
	}
</style>
<script type="text/javascript">
function loginpopup(surl){
    window.location.href ="<?php echo site_url() ;?>/wp-login.php?redirect_to="+surl;
}
jQuery(document).ready(function (){

    jQuery(".close").click(function(event) {
        jQuery(".modal").hide();
    });

        jQuery("#btnCheckout").click(function (event) {

            var plan_commission = '<?php echo $getplan['commission'];?>';
            if(plan_commission==0){
                jQuery('#paypal_form_one_time').submit();
                return false;
            }

            jQuery("#btncontainer").css('display','none');
            jQuery("#txtprocessing").css('display','');

            var orgamount = jQuery("#class_final_amount").val();
            var class_id = '<?php echo $id;?>';
            var price_id = jQuery("#class_price_id").val();
            var cancelUrl = '<?php echo $ogurl?>';
            var returnUrl = '<?php echo $ogurl;?>&task=returnpayment&class_id='+class_id+'&amount='+orgamount+'&payment_mode=paypal';

            var card_holder_name = jQuery(".full_name").val();
            var card_number = jQuery(".card-number").val();
            var card_cvc = jQuery(".card-cvc").val();
            var card_expiry_month = jQuery(".card-expiry-month").val();
            var card_expiry_year = jQuery(".card-expiry-year").val();
            var student_email = '<?php echo $login_user_email;?>';

            jQuery.ajax({
                url: "<?php echo $ogurl; ?>&task=class_checkout",
                type: "POST",
                data: {class_id: class_id,price_id:price_id,cancelUrl:cancelUrl,returnUrl:returnUrl,card_holder_name:card_holder_name,card_number:card_number,card_cvc:card_cvc,card_expiry_month:card_expiry_month,card_expiry_year:card_expiry_year,student_email:student_email},
                success: function(result) {
                    var obj = jQuery.parseJSON(result);

                    if(obj.status=="error"){
                        jQuery(".card_error").show().html(obj.error);
                    }
                    if(obj.status=="ok"){
                        jQuery(".card_error").hide();
                        if(obj.payKey){
                            jQuery("#paykey").val(obj.payKey);
                            jQuery("#submitBtn").trigger('click');
                            jQuery('#modal-content-buying').hide();

                        }else{
                            if(obj.charge_id){
                            var url = "<?php echo $ogurl;?>&task=returnpayment&class_id="+class_id+"&amount="+orgamount+"&payment_mode=stripe";
                            window.top.location.href = url;
                            }    

                        }   
                    }
                    jQuery("#btncontainer").css('display','block');
                    jQuery("#txtprocessing").css('display','none');
                }
            });
         });

        jQuery('input[name=pricescheme]').click(function (event) {
            var selval = jQuery(this).val();
            jQuery('#subvalue').text("<?php echo $currencysym;?>" + selval);
            var _amnt=returnMoney(selval);
            var _option_id=jQuery(this).attr('option_id');
            jQuery("#class_final_amount").val(_amnt);
            jQuery("#one_time_amount").val(_amnt);
            var class_id = '<?php echo $id;?>';
            var returnUrl_one_time = '<?php echo $ogurl;?>&task=returnpayment&class_id='+class_id+'&amount='+_amnt+'&payment_mode=paypal';  
            jQuery("#return_url").val(returnUrl_one_time);

            var base_url_api = '<?php if(strpos($base_url, 'braincert.org') !== false) { echo "https://www.braincert.org/";}else{ echo "https://www.braincert.com/";}?>';

            var ipnurl = base_url_api+'index.php?option=com_classroomengine&view=classdetails&task=returnpaypalapi&Id='+class_id+'&student_email=<?php echo $current_user->user_email;?>&item_number='+_option_id;

            jQuery(".one_time_notify_url").val(ipnurl);
            jQuery("#class_price_id").val(_option_id);
        });
    });

        function returnMoney(number) {
                var nStr = '' + Math.round(parseFloat(number) * 100) / 100;
                var x = nStr.split('.');
                var x1 = x[0];
                var x2 = x.length > 1 ? '.' + x[1] : '.00';
                var rgx = /(\d+)(\d{3})/;
                
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                
                return x1 + x2;
        }
	  	function buyingbtn(classid){
            jQuery("#modal-content-buying").show();
            jQuery("#pricescheme0").trigger("click");

	    }
        function viewRecordedVideo(filename,fname){
            jQuery(".video_scr").attr("src",filename);
            jQuery( "#modal_recording_content" ).show();
        }
	    function popup(url)
		{
		 params  = 'width='+screen.width;
		 params += ', height='+screen.height;
		 params += ', top=0, left=0'
		 params += ', fullscreen=yes,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,addressbar=no';

		 newwin=window.open(url,'windowname4', params);
		 if (window.focus) {newwin.focus()}
		 return false;
		}
	</script>

<?php if($row->sharing_code){ ?>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $row->sharing_code;?>" async="async"></script>
<?php } ?>

<div class="addthis_sharing_toolbox"></div>
<div style="padding-top: 10px; margin-top:5px" class="class-detail l-preview">
<br />

	
				

		<div class="class-details-title" style="border: none;">
			<div style="width: 80%;float: left;"><?php echo $result[0]['title']; ?></div>
			<div style="width: 20%;" class=" span12 status-div">
				<span class="<?php echo $class;?> class-status"><?php echo $result[0]['status']; ?></span>
			</div>
		</div>
		<hr style="border-bottom: 4px solid #d1d1d1;clear: both;">

<div style="width:97%;" class="well col-md-8">
	<div style="margin-top:2px;"></div>
		<p class="datecalrow"><span class="vctitlepink">Date and Time:</span> 
		<?php if($result[0]['status'] =='Upcoming' && !empty($result[0]['class_next_date'])) { ?>
                            	 <i class="icon icon-calendar"></i> <?php echo date('M j, Y', $result[0]['class_next_date']);

                          	}else {?>	

		 <i class="icon icon-calendar"></i>&nbsp;<?php echo date("M j, Y",strtotime($result[0]['date'])); }?>  
		<i class="icon icon-time"></i> <?php echo $result[0]['start_time']; ?> 
	
	<br>
		<span class="vctitlepink">Time Zone:</span> <?php echo $result[0]['timezone_label']; ?> 
	<br> 
		<span class="vctitlepink">Duration:</span> <?php echo $result[0]['duration']/60; ?> minutes 
	</p>
	<!--  
		<span class="vctitlepink">Datacenter Region:</span> <?php echo $result[0]['isRegion']; ?>
	-->
	<?php
							$item = $result[0];
							 							
                            $query = "SELECT count(*) FROM ".$wpdb->prefix."virtualclassroom_purchase WHERE class_id='".$id."' && payer_id='".get_current_user_id()."'";
  							$enrolled  = $wpdb->get_var(@$wpdb->prepare($query));
  							
  							
							$qq = "SELECT is_teacher FROM ".$wpdb->prefix."virtualclassroom_teacher WHERE user_id='".get_current_user_id()."'";
							$isteacher  = $wpdb->get_var(@$wpdb->prepare($qq));
							$current_user = wp_get_current_user();
							

                            if($isinstructor==1 || $item['instructor_id']==$current_user->ID){
                                $enrolled = 1;
                            }

                            if(( ($item['ispaid']==1 && $item['status']!="Past" && $enrolled==0 && $current_user->ID !=0 && $isteacher == 0 ) || $islearner==1 ) && get_current_user_id() !=0 ){?>
                                <button class="btn btn-danger btn-sm" onclick="buyingbtn(<?php echo $id; ?>); return false;" id=""><h4  style="margin: 0px;" class=" "><i class="icon-shopping-cart icon-white"></i> Buy</h4></button>
                                <?php
                            }
                            if((($item['status'] == "Live" && $enrolled) || $item['ispaid']==0 || $isteacher == 1 ) && $islearner!=1 && get_current_user_id() !=0){

					 		$data1['userId'] = sanitize_text_field($current_user->ID);
						    $data1['userName'] = sanitize_text_field($current_user->display_name);
						    $data1['lessonName'] = sanitize_text_field($item['title']);
						    $data1['courseName'] = sanitize_text_field($item['title']);
						    global $wpdb;
						    $query = "SELECT is_teacher FROM ".$wpdb->prefix."virtualclassroom_teacher WHERE user_id='".$current_user->ID."'";
  							$is_tchr  = $wpdb->get_var(@$wpdb->prepare($query));

                            $data1['isTeacher'] = 0;
                            if($item['instructor_id']>0 && $item['instructor_id']==$current_user->ID){
                                    $data1['isTeacher'] = 1;       
                            }else if($item['created_by']>0 && $item['created_by']==$current_user->ID){
                                $data1['isTeacher'] = 1;
                            }else if($is_tchr == 1){
                                $data1['isTeacher'] = 1; 
                            }

					        $data1['task'] = sanitize_text_field('getclasslaunch');
						    $data1['apikey'] = sanitize_text_field($key);
						    $data1['class_id'] = sanitize_text_field($item['id']);
                            $launchurl = (object)$vc_obj->vlcr_get_curl_info($data1);
                           /* echo $is_tchr.'is_tchr';*/
                           $mins = $item['class_starts_in'] / 60;
                           $before_time=0;
                           if(strtolower($item['status'])=="upcoming" && $mins>0 && $mins<=10 && $is_tchr==1 ){
                                $item['status'] = "live";
                                $before_time=1;
                            } 
							$url='';
                            if(isset($launchurl->encryptedlaunchurl) && strtolower($item['status']) == "live"){
                                	$url = str_replace("'\'","",$launchurl->encryptedlaunchurl);
                             }
                            if($url){ ?>
                            <br>
                            <?php 
                               global $post;
                                 ?>
                                <?php if($before_time==1){ ?>
                                    <div> 
                                        <a target="_blank" class="btn btn-primary btn-lg" style="font-weight: bold;" id="launch-btn" onclick="popup('<?php echo $url ?>'); return false;">Enter to prepare class</a>
                                    </div>    
                                <?php }else{ ?>
                                    <div> 
                                        <a target="_blank" class="btn btn-primary btn-lg" style="font-weight: bold;" id="launch-btn" onclick="popup('<?php echo $url ?>'); return false;">Launch</a>
                                    </div>
                                <?php }?>
                                
                                <?php } ?>
                                <?php
                              }else{ ?>
                                <?php if(get_current_user_id() ==0){ ?> 
                                <button class="btn btn-danger btn-sm"  onclick="loginpopup('<?php echo get_permalink($post->ID); ?>'); return false;"><h4  style="margin: 0px;" class="">Login</h4></button>
                                <br style="margin-bottom: 20px;">
                                <?php } ?>
                              <?php }
$item = $result[0];
//echo "<pre>";print_r($item);echo "</pre>";
$diff=$item['class_starts_in'];
?>
<script src="<?php echo VC_URL?>js/vlcr_countdown.js"></script>	
<?php

	if((($item['ispaid'] == 1 && $item['status'] =="Upcoming" && $enrolled ) || ( $item['status'] =="Upcoming" && $item['ispaid'] == 0 ) || $isteacher == 1 ) && $islearner!=1 && $before_time!=1){  ?>
		<script type="application/javascript">

	var myCountdownTest = new Countdown({
						width	: 400, 
						height: 70,
						time:<?php echo ($diff) ;?>
					   });



	</script> 

<?php	} ?>


	

    <?php
    $limit = 20;                                //how many items to show per page
    $results=$vc_obj->vlcr_listrecording('',$limit,$item['id']);
    $has_access=0;

    $current_user = wp_get_current_user();
    $query = "SELECT count(*) FROM ".$wpdb->prefix."virtualclassroom_shared_users WHERE class_id='".$item['id']."' && email='".$current_user->user_email."'";
    $is_shared  = $wpdb->get_var(@$wpdb->prepare($query));

    if(!empty($allowClass_list)){
        if (in_array($item['id'], $allowClass_list)){
            $has_access=1;
        }
    }
    $is_super_admin = is_super_admin(get_current_user_id());
    if($enrolled>0 || $isteacher==1 || $is_shared>0 || $is_super_admin>0){
        $has_access=1;
    }
    //$item['record'] == 1 && ($this -> isSharedUser ||  $this->enrolled || $this->class['user_id'] == $user->id)
    if($item['record'] != 0 && $has_access==1){?>
    <br>
    <div class="listing">
        <div style="display: inline;border: 1px solid #d1d1d1;border-width: 1px 1px 0 1px;margin: 0 5px 0 0;padding: 10px 10px 6px 10px;border-radius: 5px 5px 0px 0px;font-weight: bold;">Class Recordings</div>
        <table class="table table-bordered">
        <thead class="alert alert-info" style="background: #00b9eb;color: white;">
            <tr>
                <th style="width: 35px;">#</th>
                <th>Name</th>
                <th>Date/Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for($i = 0; $i < count($results) ; $i++ ) {
            $result = $results[$i];
            if($result['status']==1){
            ?>
            <tr>
            <td><b><?php echo ($i+1);?></b></td>
            <td><?php echo $result['fname']?$result['fname']:"Recording ".($i+1);?> </td>
            <td><?php echo $result['date_recorded'];?></td>
            <td><i class="fa fa-facetime-video"></i>&nbsp;<a  href="javascript:void(0)" onclick="viewRecordedVideo('<?php echo $result['record_path']; ?>', '<?php echo rawurlencode($result['fname']); ?>');">View Class Recording</a> </td>
            </tr>
            <?php } } ?>
        </tbody>
        </table>
    </div>
    <?php }?>
</div>
</div>

<div id="modal_recording_content" class="modal">
    <div class="modal-content">
        <span><b>View Recording</b></span>
        <span class="close">&times;</span>
        <div>
        <video width="800" height="500" controls class="video_scr" src=""></video>
        </div>
    </div>
</div>

<form action="https://www.<?php echo strpos($base_url, 'braincert.org') !== false ? 'sandbox.' : ''; ?>paypal.com/cgi-bin/webscr" method="post" class="paypal-form" target="_top" id="paypal_form_one_time">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="amount" id="one_time_amount" value="">
<input type="hidden" name="business" value="<?php echo $paymentInfo['paypal_id']; ?>">
<input type="hidden" name="item_name" value="<?php echo $result[0]['title']; ?>">
<input type="hidden" name="currency_code" value="<?php echo strtoupper($result[0]['currency']); ?>">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="rm" value="1">
<input type="hidden" name="custom" value="">
<input type="hidden" name="return" id="return_url" value="">
<input type="hidden" name="cancel_return" value="<?php echo $ogurl; ?>">
<input type="hidden" name="notify_url" class="one_time_notify_url" value="">
</form>