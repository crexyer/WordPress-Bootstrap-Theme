<?php
function bootstrap_add_admin() {
	global $options;
	$options = array (
		array (
				"name" => __ ( 'Navbar Brand', 'Bootstrap' ),
				"id" => "navbar_brand",
				"std" => get_bloginfo ( 'name' ),
				"type" => "text"
		),
		array (
				"name" => __ ( 'Theme Style', 'Bootstrap' ),
				"id" => "theme_style",
				"std" => "flat",
				"type" => "radio",
				"list" => array (
					"flat" => __ ( 'Flat', 'Bootstrap' ),
					"skeuomorphism" => __ ( 'Skeuomorphism', 'Bootstrap' )
				)
		),
		array (
				"name" => __ ( 'Navbar Color', 'Bootstrap' ),
				"id" => "navbar_color",
				"std" => "black",
				"type" => "radio",
				"list" => array (
					"black" => __ ( 'Black', 'Bootstrap' ),
					"white" => __ ( 'White', 'Bootstrap' )
				)
		),
		array (
				"name" => __ ( 'Analytics Code', 'Bootstrap' ),
				"id" => "analytics_code",
				"std" => "",
				"type" => "textarea",
				"label" => __ ( 'Enter your analytics codes or other html codes.', 'Bootstrap' )
		)
	);
	
	if ( $_GET ['page'] == basename ( __FILE__ ) ) {
		if ( 'save' == $_REQUEST ['action'] ) {
			foreach ( $options as $value ) {
				update_option ( $value ['id'], $_REQUEST [$value ['id']] );
			}
			foreach ( $options as $value ) {
				if ( isset ( $_REQUEST [$value ['id']] ) ) {
					update_option ( $value ['id'], $_REQUEST [$value ['id']] );
				} else {
					delete_option ( $value ['id'] );
				}
			}
			header ( "Location: themes.php?page=control.php&saved=true" );
			die ();
		} else if ( 'reset' == $_REQUEST ['action'] ) {
			foreach ( $options as $value ) {
				delete_option ( $value ['id'] );
				update_option ( $value ['id'], $value ['std'] );
			}
			header ( "Location: themes.php?page=control.php&reset=true" );
			die ();
		}
	}
	add_theme_page( __ ( 'Theme Setup', 'Bootstrap' ), __ ( 'Theme Setup', 'Bootstrap' ), 'edit_theme_options', basename ( __FILE__ ), 'bootstrap_admin' );
}
function bootstrap_admin() {
	global $options;
	if ( $_REQUEST ['saved'] )
		echo '<div id="message" class="updated fade"><p>' . __ ( 'Your settings have been saved.', 'Bootstrap' ) . '</p></div>';
	if ( $_REQUEST ['reset'] )
		echo '<div id="message" class="updated fade"><p>' . __ ( 'Your settings have been reset.', 'Bootstrap' ) . '</p></div>';
	?>
<div class="wrap">
	<h2><?php _e ( 'Theme Setup', 'Bootstrap' ); ?></h2>
	<form method="post">
		<table class="form-table">
			<tbody>
			<?php
				foreach ( $options as $value ) {
					if ( $value ['type'] == "text" ) {
			?>
        <tr valign="top">
					<th scope="row"><label><?php echo $value['name']; ?></label></th>
					<td>
						<input name="<?php echo $value['id']; ?>" class="regular-text ltr" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo stripslashes ( get_option ( $value['id'], $value['std'] )); ?>" size="40" />
						<?php
  						if ( isset ( $value ['label'] ) && $value ['label'] != "" ) {
								echo '<p class="description">' . $value ['label'] . '</p>';
							}
						?>
					</td>
				</tr>
    	<?php } elseif ( $value['type'] == "textarea" ) { ?>
        <tr valign="top">
					<th scope="row"><label><?php echo $value['name']; ?></label></th>
					<td><textarea name="<?php echo $value['id']; ?>" class="widefat" rows="5"><?php echo stripslashes ( get_option ( $value['id'], $value['std'] )); ?></textarea>
      	<?php
    			if ( isset ( $value ['label'] ) && $value ['label'] != "" ) {
						echo '<p class="description">' . $value ['label'] . '</p>';
					}
				?>
        	</td>
				</tr>
     	<?php } elseif ( $value['type'] == "radio" ) { ?>
        <tr valign="top">
					<th scope="row"><label><?php echo $value['name']; ?></label></th>
					<td>
						<fieldset>
						<?php
							foreach ( $value['list'] as $key => $radio) {
    						?>
    						<label>
    							<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>"<?php if ( get_option ( $value['id'], $value['std'] ) == $key ) { ?> checked="checked"<?php } ?>/>
    							<span><?php echo $radio; ?></span>
    						</label>
    						<br>
							<?php }?>
						<?php
  						if ( isset ( $value ['label'] ) && $value ['label'] != "" ) {
								echo '<p class="description">' . $value ['label'] . '</p>';
							}
						?>
						</fieldset>
					</td>
				</tr>
     	<?php }?>
      <?php } ?>
    	</tbody>
		</table>
		<div class="submit">
			<input name="save" class="button button-primary" type="submit" value="<?php _e ( 'Save', 'Bootstrap' ); ?>" />
			<input type="hidden" name="action" value="save" />
		</div>
	</form>
</div>
<div class="wrap">
	<h2 class="title"><?php _e ( 'Reset Settings', 'Bootstrap' ); ?></h2>
	<p><?php _e ( 'If you want to reset your settings, please click reset button.', 'Bootstrap' ); ?></p>
	<form method="post">
		<div class="submit">
			<input name="reset" class="button" type="submit" value="<?php _e ( 'Reset', 'Bootstrap' ); ?>" />
			<input type="hidden" name="action" value="reset" />
		</div>
	</form>
</div>
<div class="wrap">
	<h2 class="title"><?php _e ( 'About', 'Bootstrap' ); ?></h2>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row"><label><?php _e ( 'Theme Version', 'Bootstrap' ); ?></label></th>
				<td><?php echo wp_get_theme() -> get( 'Version' ); ?></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label><?php _e ( 'Designer', 'Bootstrap' ); ?></label></th>
				<td>Crexyer</td>
			</tr>
		</tbody>
	</table>
	<p><?php printf( __ ( 'If you have feedback or questions, please click %s.', 'Bootstrap' ), '<a href="http://www.crexyer.com/" target="_blank">http://www.crexyer.com/</a>' ); ?></p>
</div>
<?php
	}
	add_action ( 'admin_menu', 'bootstrap_add_admin' );
?>