<?php
/*Html Menu*/

/*
 * @fn menu for displaying the instruction
 */
function ic_generate_option_page()
{
?>
        <h4>Welcome to Ad Tag Plugin</h4>
        <h5>Steps to add an ad tag into your template files.</h5><br/>
        <ol>
            <li>There are basically 3 types of banner you could add onto your website .
                <ol><li> viz : 728x90,300x250,160x600.</li></ol>
            </li>
            <li>Select a spage where wou want to place a ad and copy the following line. <br/>
                   <ol>
                       <li>
                           echo ic_ad_tag("sizexsize"); put php tags if necessary.<br/>
                           if size is not specified it would be 728x90 by default
                       </li>
                       <li>
                           You need to enter the publisher name into the IC AD Tag option<br/>
                       </li>
                       <li>
                            If publisher is not specified there wont be any ad .
                       </li>
                       <li>
                           If you want to place the ad into center just add a center tag.<br/>
                       </li>
                   </ol>
            </li>
            <li>
                If you dont want to edit template files just download the <a href="http://wordpress.org/extend/plugins/php-code-widget/">plugin</a>.
            </li>
            <li>
                Place the widget into the side bar.
            </li>
            <li>
                Then add the function as above in the php tags.
            </li>
        </ol>

        <h5>Using Short Code In Post</h5><br/>
        <ol>
            <li>
                Enter the tag [ic_ad_tag] to get default 300x250 size add.<br/>
            </li>
            <li>
                If you want a custom ad size just specify the size . <br/>
                for eg. [ic_ad_tag 160*x600]
            </li>
        </ol>

        <h5>While Creating A post</h5><br/>
        <ol>
            <li>
                The target block would appear into the add/edit post page.
            </li>
            <li>
                While Creating a post please select the target what that post is related to.
            </li>
        </ol>


<div>
<h2><?php __('Please Enter The Publisher Name','ic_pub_title');?></h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

	<table width="510">
		<tr valign="top">
		<th width="92" scope="row"><?php __('Publisher','ic_publisher');?></th>
			<td width="406">
			<input name="ic_pub_name" type="text" id="ic_pub_name"
			value="<?php echo get_option('ic_pub_name'); ?>" />
			(ex. benzinga)
			</td>
		</tr>
	</table>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="ic_pub_name" />

	<p>
		<input type="submit" value="Save Changes" />
	</p>

</form>
</div>

<?php
}
?>