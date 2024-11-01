<?php
include_once 'target-box-plugin-config.php';

/*
 * @fn target load
 * This function would load a box in to the post page for the admin .
 */
function ic_generate_targets($post,$box)
{
   global $ic_targets;
   $ic_get_targets = "";
   sort($ic_targets);
   $ic_selected_target = (string)get_post_meta($post->ID,'_target_lst',true);
   foreach($ic_targets as $ic_value)
    {
           if($ic_value != $ic_selected_target)
                $ic_get_targets .= '<option value="'.$ic_value.'">'.$ic_value.'</option>';
           else
                $ic_get_targets .= '<option value="'.$ic_value.'" selected="selected">'.$ic_value.'</option>';
    }
    echo '<p>'.__('Select Target','ic-target-box-plugin').'<select id="combo_target_lst" name="combo_target">'.$ic_get_targets.'</select></p>';
}


/*
 * @fn target save
 * This function would save the selected value inside the combobox while updating the post.
 */
function ic_save_target($post_id)
{
    /*Wp function gets called on update of the post*/
    update_post_meta($post_id,'_target_lst',esc_attr($_POST['combo_target']));
}



?>