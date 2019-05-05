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
$users= get_users();
if (isset($_POST['inviteuser'])){
	
	$data =$_POST;
	//$result=$vc_obj->vlcr_invite_user($data,0);
  $result=$vc_obj->vlcr_invite_by_email($data);
}
echo "<h1>Invite Users</h1>";

?>
<form method='post' action='' name="vlcr_invusers">
   <table class="wp-list-table widefat striped">
   <tr>
	   <th>#</th>
	   <th>Name</th>
	   <th>Email</th>
   </tr>
      <?php foreach($users as $user){ ?>
      <tr>
         <td>
            <input type='checkbox' name='email[]' value='<?php echo $user->data->user_email;?>' />
         </td>
      
         <td>
           <?php echo $user->data->user_nicename;?>
         </td>
     
         <td>
            <?php echo $user->data->user_email;?>
         </td>
      </tr>
      <?php } ?>
      <tr>
      	<td colspan="2">
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
      		<input id="save" type="submit" class="button button-primary" value="Save Changes" name="inviteuser"></td></tr>
   </table>
</form>