<?php
//Simple function to check if partial strings are present in bigger ones. We'll use this later.
function StringContains($haystack, $needle){
    $pos = strpos($haystack,$needle);
    if($pos === false) {
     return false;
    }
    else {
      return true;
    }
}

add_action( 'admin_menu', 'f_display_opts_add_page' ); 

function f_display_opts_add_page() {
	add_menu_page('options-general.php', 'ACF Field Display', 'edit_theme_options', 'acf_show_fields', 'acf_show_fields', AFD_URL .'/css/icons/list-fields.png' );
}

function acf_show_fields(){
	global $wpdb;
	global $post;

	//Grab ACF Field Group Object
	$rules = $wpdb->get_results('SELECT * FROM  wp_postmeta WHERE meta_key =  "rule"');
	//Creates the table. The ID and Class make the sorting work. ?>
	<h2>Current Custom Fields</h2>
	<p class="description">Click the table headers to sort.</p>
	
	<?php if($rules[0] != ''){ ?>
		<table id="acf-table" class="tablesorter wp-list-table widefat users">
			<thead>
				<tr> 
					<th>Field Label</th>
					<th>Field Name</th>
					<th>Field Type</th>
					<th>Field Group</th>
				</tr>
			</thead>
		<?php		
			foreach ($rules as $rule) {
				
				//Grab the id the of ACF Field group
				$ruleID = $rule->post_id;
				
				//Get more from the object by using the get_post() function. Ultimately, we're trying to get
				//the name of the field group
				$newObj = get_post($ruleID);
				$grpName = $newObj->post_title;
				//Gets the custom field keys from the groups ID
				$cfk = get_post_custom_keys($ruleID);
				//Create an array that will hold our individual field keys				 
				$fldIds = array();			
				//Check to see if field_ exists in the array item and if it does, push the field into the new array we just created
				foreach ($cfk as $cf) {
					if(StringContains($cf, "field_")){
						array_push($fldIds, $cf);
					}
				}
				//now, we can grab the field objects with our newly created field key
				foreach($fldIds as $fldId){

					$goodStuff = get_field_object($fldId);
					$gl = $goodStuff['label'];
					$gn = $goodStuff['name'];
					$gst = $goodStuff['type'];
					?>
					<?php //Put our data in the table ?>
					<tr>
						<td><a href="<?php echo site_url('/wp-admin/post.php?post=' . $ruleID . '&action=edit'); ?>"><?php echo $gl; ?></a></td>
						<td><?php echo $gn; ?></td>
						<td><?php echo $gst; ?></td>
						<td><?php echo $grpName; ?></td>
					</tr>

				<?php 
				}
			}
		?>
		</table>
	<?php } else {?>
		<h2>You don't have any fields created yet.</h2>
		<h3><a href="<?php echo site_url('/wp-admin/post-new.php?post_type=acf'); ?>">Get Started!</a></h3>
	<?php } // End if ?>
<?php } //acf_show_fields() 
?>