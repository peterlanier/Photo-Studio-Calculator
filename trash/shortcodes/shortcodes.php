<?php

function discount_volume_table_func( $atts ){

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

$html =<<<AAA
<div class="my-button" id="ref" aria-describedby="pop">reference</div>
<div class="volume-discount-tooltip tooltip" id="pop">
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

	return $html;
}
add_shortcode( 'discount_volume_table', 'discount_volume_table_func' );




function storescope_discount_table_func( $atts ){
	$storescope_discount = esc_attr(get_option('storescope_discount'));

	return $storescope_discount;
}
add_shortcode( 'discount_storescope_table', 'storescope_discount_table_func' );