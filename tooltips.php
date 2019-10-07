<?php

//Localize Scripts
    wp_register_script('my-tooltips', plugins_url( '/js/tooltips.js', __FILE__ ), array('popper', 'tooltip'), '', true);

    $d1_min = esc_attr(get_option('d1_min'));
	$d1_max = esc_attr(get_option('d1_max'));
	$d1_price = esc_attr(get_option('d1_price'));
	$d2_min = esc_attr(get_option('d2_min'));
	$d2_max = esc_attr(get_option('d2_max'));
	$d2_price = esc_attr(get_option('d2_price'));
	$d3_min = esc_attr(get_option('d3_min'));
	$d3_max = esc_attr(get_option('d3_max'));
	$d3_price = esc_attr(get_option('d3_price'));
	$d4_min = esc_attr(get_option('d4_min'));
	$d4_max = esc_attr(get_option('d4_max'));
	$d4_price = esc_attr(get_option('d4_price'));
	$d5_min = esc_attr(get_option('d5_min'));
	$d5_max = esc_attr(get_option('d5_max'));
	$d5_price = esc_attr(get_option('d5_price'));
	$storescope_discount = esc_attr(get_option('storescope_discount'));
	$storescope_discount2 = $storescope_discount * 2;
	$storescope_discount3 = $storescope_discount * 3;

$html1 =<<<AAA

<div class="volume-discount-tooltip my-tooltip" id="pop-1">
	<h4>Volume Discount Table</h4>
	<table>
	  <tr>
	    <th>Product Range</th>
	    <th>Price per Photo</th>
	  </tr>
	  <tr>
	    <td>{$d1_min} - {$d1_max}</td>
	    <td>{$d1_price}</td>
	  </tr>
	  <tr>
	    <td>{$d2_min} - {$d2_max}</td>
	    <td>{$d2_price}</td>
	  </tr>
	  <tr>
	    <td>{$d3_min} - {$d3_max}</td>
	    <td>{$d3_price}</td>
	  </tr>
	  <tr>
	    <td>{$d4_min} - {$d4_max}</td>
	    <td>{$d4_price}</td>
	  </tr>
	  <tr>
	    <td>{$d5_min} - {$d5_max}</td>
	    <td>{$d5_price}</td>
	  </tr>
	</table>
</div>
AAA;

$html2 =<<<BBB
<div class="storescope-discount-tooltip my-tooltip" id="pop-2">
	<h4>Storescope Discount</h4>
	<table>
		<tr>
			<th>Number of Stores</th>
			<th>Discount</th>
		</tr>
		<tr>
			<td>1st store</td>
			<td>none</td>
		</tr>
		<tr>
			<td>2nd store</td>
			<td>{$storescope_discount}%</td>
		</tr>
		<tr>
			<td>3rd store</td>
			<td>{$storescope_discount2}%</td>
		</tr>
		<tr>
			<td>Additional stores</td>
			<td>{$storescope_discount3}%</td>
		</tr>
	</table>
</div>
BBB;

$html3 =<<<CCC
<div class="backdrops-tooltip my-tooltip form-tooltip-content">
How many different backdrops will be associated with each product set. Kind of like storescopes.
</div>
CCC;

    // Localize the script with new data
	$translation_array = array(
		'disc_vol_table' => __( $html1, 'plugin-domain' ),
		'disc_store_table' => __( $html2, 'plugin-domain' ),
		'backdrops' => __( $html3, 'plugin-domain' )

	);
	wp_localize_script( 'my-tooltips', 'tooltips', $translation_array );

	// Enqueued script with localized data.
	wp_enqueue_script( 'my-tooltips' );