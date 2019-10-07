<?php
//Add Menu Item & Register Settings
add_action( 'admin_menu', 'photo_calc_menu' );
add_action('admin_init', 'register_ps_settings');
function photo_calc_menu() {
    add_options_page('Photography Studio', 'Photo Studio Calculator', 'administrator', 'photo-calc.php', 'photo_calc');
}
function register_ps_settings(){
    register_setting('photo_studio', 'd1_min' );
    register_setting('photo_studio', 'd1_max' );
    register_setting('photo_studio', 'd1_price' );
    register_setting('photo_studio', 'd1_perc' );
    register_setting('photo_studio', 'd2_min' );
    register_setting('photo_studio', 'd2_max' );
    register_setting('photo_studio', 'd2_price' );
    register_setting('photo_studio', 'd2_perc' );
    register_setting('photo_studio', 'd3_min' );
    register_setting('photo_studio', 'd3_max' );
    register_setting('photo_studio', 'd3_price' );
    register_setting('photo_studio', 'd3_perc' );
    register_setting('photo_studio', 'd4_min' );
    register_setting('photo_studio', 'd4_max' );
    register_setting('photo_studio', 'd4_price' );
    register_setting('photo_studio', 'd4_perc' );
    register_setting('photo_studio', 'd5_min' );
    register_setting('photo_studio', 'd5_max' );
    register_setting('photo_studio', 'd5_price' );
    register_setting('photo_studio', 'd5_perc' );
    
    register_setting('photo_studio', 'prod_desc' );
    register_setting('photo_studio', 'min_purchase');
    register_setting('photo_studio', 'unit_price');
    register_setting('photo_studio', 'storescope_discount');
    
}

//Render the Admin Page
function photo_calc(){
	?>
	<div class="wrap">
		<h1>Photography Studio Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'photo_studio' ); ?>
            <?php do_settings_sections( 'photo_studio' ); ?>
            <h2>Basic Unit Price</h2>
            <table>
                <tr valign="top">
                    <td><input type="number" name="unit_price" value="<?php echo esc_attr( get_option('unit_price') ); ?>" min="0.01" step="0.01" /></td>
                </tr>
            </table>
            <h2>Volume Discounts</h2>
            <table class="form-table">

                <tr>
                    <th></th>
                    <th>Minimum Range</th>
                    <th>Maximum Range</th>
                     <th>Price per Photo</th>
                    <th>Discount Percentage</th>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Tier 1</th>
                    <td><input type="number" name="d1_min" value="<?php echo esc_attr( get_option('d1_min') ); ?>" /></td>
                    <td><input type="number" name="d1_max" value="<?php echo esc_attr( get_option('d1_max') ); ?>" /></td>
                    <td>$<input type="number" name="d1_price" value="<?php echo esc_attr( get_option('d1_price') ); ?>" min="0.00" step="0.01" /></td>
                    <td><input type="number" name="d1_perc" value="<?php echo esc_attr( get_option('d1_perc') ); ?>" min="0.00" step="0.01" />%</td>
                </tr>

                <tr valign="top">
                    <th scope="row">Tier 2</th>
                    <td><input type="number" name="d2_min" value="<?php echo esc_attr( get_option('d2_min') ); ?>" /></td>
                    <td><input type="number" name="d2_max" value="<?php echo esc_attr( get_option('d2_max') ); ?>" /></td>
                    <td>$<input type="number" name="d2_price" value="<?php echo esc_attr( get_option('d2_price') ); ?>" min="0.01" step="0.01" /></td>
                    <td><input type="number" name="d2_perc" value="<?php echo esc_attr( get_option('d2_perc') ); ?>" min="0.01" step="0.01" />%</td>
                </tr>

                <tr valign="top">
                    <th scope="row">Tier 3</th>
                    <td><input type="number" name="d3_min" value="<?php echo esc_attr( get_option('d3_min') ); ?>" /></td>
                    <td><input type="number" name="d3_max" value="<?php echo esc_attr( get_option('d3_max') ); ?>" /></td>
                    <td>$<input type="number" name="d3_price" value="<?php echo esc_attr( get_option('d3_price') ); ?>" min="0.01" step="0.01" /></td>
                    <td><input type="number" name="d3_perc" value="<?php echo esc_attr( get_option('d3_perc') ); ?>" min="0.01" step="0.01" />%</td>
                </tr>

                <tr valign="top">
                    <th scope="row">Tier 4</th>
                    <td><input type="number" name="d4_min" value="<?php echo esc_attr( get_option('d4_min') ); ?>" /></td>
                    <td><input type="number" name="d4_max" value="<?php echo esc_attr( get_option('d4_max') ); ?>" /></td>
                    <td>$<input type="number" name="d4_price" value="<?php echo esc_attr( get_option('d4_price') ); ?>" min="0.01" step="0.01" /></td>
                    <td><input type="number" name="d4_perc" value="<?php echo esc_attr( get_option('d4_perc') ); ?>" min="0.01" step="0.01" />%</td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Tier 5</th>
                    <td><input type="number" name="d5_min" value="<?php echo esc_attr( get_option('d5_min') ); ?>" /></td>
                    <td><input type="number" name="d5_max" value="<?php echo esc_attr( get_option('d5_max') ); ?>" /></td>
                    <td>$<input type="number" name="d5_price" value="<?php echo esc_attr( get_option('d5_price') ); ?>" min="0.01" step="0.01" /></td>
                    <td><input type="number" name="d5_perc" value="<?php echo esc_attr( get_option('d5_perc') ); ?>" min="0.01" step="0.01" />%</td>
                </tr>

            </table>

            <h2>Storescope Discount</h2>
            <table>
                <tr valign="top">
                    <td><input type="number" name="storescope_discount" value="<?php echo esc_attr( get_option('storescope_discount') ); ?>" min="0.01" step="0.01" />% per additional scope</td>
                </tr>
            </table>

            <h2>Product Description</h2>
            <table>
                <tr valign="top">
                    <td>$<input type="number" name="prod_desc" value="<?php echo esc_attr( get_option('prod_desc') ); ?>" min="0.01" step="0.01" /> per product description</td>
                </tr>
            </table>

            <h2>Minimum Price</h2>
            <table>
                <tr valign="top">
                    <td><input type="number" name="min_purchase" value="<?php echo esc_attr( get_option('min_purchase') ); ?>" min="0.01" step="0.01" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>

	</div>
	<?php
}