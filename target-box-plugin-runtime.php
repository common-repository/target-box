<?php
include_once 'target-box-plugin-config.php';

/*
 * @fn ic ad tag
 * This function adds the tag into the template files.
 * To call just place the statement echo ic_ad_tag("sizexsize");
 * There are three sizes 728x90, 300x250, 160x600
 */
function ic_ad_tag($ad_tag_size)
{
    global $post,$ic_ad_tag_url,$ic_default_ad_size,$ic_default_target; /*<< Access the global value*/
	
    $ic_publisher = get_option('ic_pub_name');
    /*Would get the stored value with the id _target_lst and return as a string*/
    $ic_selected_target = (string)get_post_meta($post->ID,'_target_lst',true);
	
	if($ic_publisher == "")
        return "";

	if( empty($ic_selected_target) )
        $ic_selected_target = $ic_default_target;

    if (!preg_match("/^[0-9]*+x+[0-9]*$/", $ad_tag_size, $matches))
        $ad_tag_size = $ic_default_ad_size;
		
	
	return "<script type = 'text/javascript' src = '$ic_ad_tag_url/$ic_publisher/$ic_selected_target/$ad_tag_size.js'></script>";
}

/*
 * @fn short code.
 * This function is called when the wp finds any specified short code.
 * in this case [ic_ad_tag]
 * returns the entire script tag with the ad in it.
 */
function ic_shortcode_ad_tag($atts)
{
	$ad_size = $atts[0];
	return ic_ad_tag($ad_size);
}
?>