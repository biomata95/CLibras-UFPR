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

if($_REQUEST['type']!="inviteusergroup"){
  if (!is_plugin_active( 'groups/groups.php' ) ) {
    echo "<div class='error'>
          <h2>If you want to invite users using their groups then you must need to install groups plugin.</h2>
          <h3>you can download plugin using below link.</h3>
          <p><a href='https://wordpress.org/plugins/groups/'>https://wordpress.org/plugins/groups/</a></p>
          </div>";
    return;

  }
}

$vc_obj = new vlcr_class();
$vc_setting=$vc_obj->vlcr_setting_check();
if($vc_setting==1){
    echo "Please setup API key and URL";
    return;
}
$id=$_REQUEST['id'];
$users= get_users();
if (isset($_POST['invitegroup'])){
	
	$data =$_POST;
  $result=$vc_obj->vlcr_get_groupsdata($data);
}
$groups=$vc_obj->vlcr_get_usergroups();



echo "<h1>Invite users of selected groups</h1>";

?>
<form method='post' action='' name="vlcr_invusers">
   <table class="wp-list-table widefat striped">
   <tr>
	   <th>#</th>
	   <th>Name</th>
	   
   </tr>
      <?php foreach($groups as $group){


       ?>
      <tr>
         <td>
            <input type='checkbox' name='gid[]' value='<?php echo $group->group_id;?>' />
         </td>
      
         <td>
           <?php echo $group->name;?>
         </td>
     
         
      </tr>
      <?php } ?>
      <tr>
      	<td colspan="2">
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
      		<input id="save" type="submit" class="button button-primary" value="Save Changes" name="invitegroup"></td></tr>
   </table>
</form>