<?php

add_action( 'gform_pre_submission_3', 'calculate_photos' );
function calculate_photos($form) {

	//Get the inputs
	$skus = $_POST['input_2'];
	$shots = $_POST['input_3'];
	$backdrops = $_POST['input_4'];
	$volume_discount_percentage = 0;

	//Get the appropriate volume discount percentage
	if ($skus >= get_option('d1_min') && $skus <= get_option('d1_max') ){
		$volume_discount_percentage = get_option('d1_perc')/100;//this is a percentage, not a unit price

	} elseif ($skus >= get_option('d2_min') && $skus <= get_option('d2_max') ){
		$volume_discount_percentage = get_option('d2_perc')/100;

	} elseif ($skus >= get_option('d3_min') && $skus <= get_option('d3_max') ){
		$volume_discount_percentage = get_option('d3_perc')/100;

	} elseif ($skus >= get_option('d4_min') && $skus <= get_option('d4_max') ){
		$volume_discount_percentage = get_option('d4_perc')/100;

	} elseif ($skus >= get_option('d5_min') ){
		$volume_discount_percentage = get_option('d5_perc')/100;

	}

	//Photo Calculations
	$photos_per_setting = $skus * $shots;
	$total_photos = $photos_per_setting * $backdrops;
	$unit_price = get_option('unit_price');
	$total_before_discount = $total_photos * $unit_price;
	$volume_discount = ($volume_discount_percentage) * $total_before_discount;

	$total_after_volume_discount = $total_before_discount - $volume_discount;
	$adjusted_unit_price = $total_after_volume_discount / $total_photos;

	$storescope_discount_rate = get_option('storescope_discount')/100;
	$storescope_discount = 0;
	$i = $backdrops;

	//Calculate total storescope discount using tiers as a multiple of the base percentage
	while($i > 1){
		if($i>=4){
			$storescope_discount += $photos_per_setting * $adjusted_unit_price * ($storescope_discount_rate * 3);
		} elseif($i>=3){
			$storescope_discount += $photos_per_setting * $adjusted_unit_price * ($storescope_discount_rate * 2);
		} elseif($i>=2){
			$storescope_discount += $photos_per_setting * $adjusted_unit_price * ($storescope_discount_rate);
		} else {
			break;
		}
		$i--;
	}

	$estimate = $total_after_volume_discount - $storescope_discount; //total for the user
	$average_price_per_photo = $estimate / $total_photos;

	//Product Description Calculations
	$prod_desc_unit_price = get_option('prod_desc');
	$j = $backdrops;
	$discounted_prod_desc_total = 0;

	while($j > 1){
		if($j>=4){
			$discounted_prod_desc_total += $photos_per_setting * $prod_desc_unit_price * ($storescope_discount_rate * 3);
		} elseif($j>=3){
			$discounted_prod_desc_total += $photos_per_setting * $prod_desc_unit_price * ($storescope_discount_rate * 2);
		} elseif($j>=2){
			$discounted_prod_desc_total += $photos_per_setting * $prod_desc_unit_price * ($storescope_discount_rate);
		} else {
			break;
		}
		$j--;
	}

	//Set the final inputs
	$_POST['input_11'] = $total_photos;
	if($total_before_discount < 100){
		$_POST['input_12'] = 100;
	} else {
		$_POST['input_12'] = $total_before_discount;
	}
	$_POST['input_13'] = $volume_discount;
	$_POST['input_14'] = $storescope_discount;
	if($estimate < 100){
		$_POST['input_15'] = 100;
	} else {
		$_POST['input_15'] = $estimate;
	}
	$_POST['input_16'] = $average_price_per_photo;
	$_POST['input_17'] = $discounted_prod_desc_total;
}