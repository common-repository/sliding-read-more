<?php

  if (isset($_POST['slidingreadmore_Submit']))
  {   
		update_option( 'slidingreadmore_readmore', $_POST['slidingreadmore_readmore'] );	
		update_option( 'slidingreadmore_readless', $_POST['slidingreadmore_readless'] );
  }

?> 
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<?php echo "  <h2>" . __('Sliding Read More', 'sliding-read-more') . "</h2>"; ?>
<br/>
    <a href="http://www.bluelayermedia.com/hosting/"><img
            src="<?php bloginfo('wpurl');?>/wp-content/plugins/sliding-read-more/images/hosting-offer.png" border="0"/></a>
    <br/><br/>
<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<p><?php echo __( 'Set the text that will show for the Read More and Read Less links of the slider', 'sliding-read-more' ); ?></p>    
  <table class="form-table">
    <tbody>
    <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Read More Link Text','sliding-read-more'); ?></label></th>
        <td>
          <input type="text" id="slidingreadmore_readmore" name="slidingreadmore_readmore" class="regular-text" value="<?php echo get_option( 'slidingreadmore_readmore' ); ?> " />
        </td>
      </tr>
    <tr valign="top">
        <th scope="row"><label for="name"><?php echo __('Read Less Link Text','sliding-read-more'); ?></label></th>
        <td>
          <input type="text" id="slidingreadmore_readless" name="slidingreadmore_readless" class="regular-text" value="<?php echo get_option( 'slidingreadmore_readless' ); ?> " />
        </td>
      </tr>
    </tbody>
  </table>
  <p class="submit">
    <input type="submit" value="Update" class="button-primary" name="slidingreadmore_Submit" />
  </p>
</form>
</div>