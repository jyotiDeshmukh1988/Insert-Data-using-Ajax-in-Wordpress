<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 */

add_action('wp_ajax_contact','ajax_contact_us');
function ajax_contact_us(){
	$arr = [];
	wp_parse_str($_POST['contact_us'],$arr);
	global $wpdb;
	global $table_prefix;
	$table = $table_prefix.'contact';
	$result = $wpdb->insert($table,[
	"name"=>$arr['name'],
	"email"=>$arr['email']
	]);
	//wp_send_json_success($result);
	if($result>0){
		wp_send_json_success("Data inserted");
	}else{
		wp_send_json_error("Please try again");
	}
	//echo "<pre>";
	//print_r($arr);
	//wp_send_json_success("test");
}






