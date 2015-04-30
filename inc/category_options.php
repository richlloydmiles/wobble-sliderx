<?php

// Add the fields to the "slideshows" taxonomy, using our callback function  
add_action( 'wxsliders_edit_form_fields', 'wxsliders_taxonomy_custom_fields', 10, 2 );  

// Save the changes made on the "slideshows" taxonomy, using our callback function  
add_action( 'edited_slideshows', 'save_taxonomy_custom_fields_wxsliders', 10, 2 );  
// A callback function to add a custom field to our "slideshows" taxonomy  
function wxsliders_taxonomy_custom_fields($tag) {  
   // Check for existing taxonomy meta for the term you're editing  
    $t_id = $tag->term_id; // Get the ID of the term you're editing  
    $term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check  
    ?>
    <style>
        .nav-tab {
            cursor: pointer;
        }
    </style>
    <!-- TEMPLATE SECTION ____________________________________________________________________________________-->
    <tr class="func-tab">  
        <th scope="row" valign="top">  
            <label for="term_meta[slider_auto]"><?php  _e( 'Automatic Animation', 'wobble' ); ?></label>  
        </th>  
        <td> 
            <input type="radio" name="wobble_auto" value="true">True
            <input type="radio" name="wobble_auto" value="false">False
            <input type="hidden" class="wobble_auto" name="term_meta[slider_auto]" id="term_meta[slider_auto]" value="<?php echo $term_meta['slider_auto'] ? $term_meta['slider_auto'] : ''; ?>">
            <p class="description">
              Animate automatically, true or false  
          </p>
      </td>  
  </tr>
  <tr class="general-tab">  
    <th scope="row" valign="top">  
        <label for="term_meta[slider_auto]"><?php  _e( 'Automatic Animation', 'wobble' ); ?></label>  
    </th>  
    <td> 
        <input type="radio" name="wobble_auto" value="true">True
        <input type="radio" name="wobble_auto" value="false">False
        <input type="hidden" class="wobble_auto" name="term_meta[slider_auto]" id="term_meta[slider_auto]" value="<?php echo $term_meta['slider_auto'] ? $term_meta['slider_auto'] : ''; ?>">
        <p class="description">
          Animate automatically, true or false  
      </p>
  </td>  
</tr>
<?php 
ob_start();
?>
<h2 class="nav-tab-wrapper wxslider-nav">
  <a id="general-tab" class="nav-tab nav-tab-active">General</a>
  <a id="func-tab" class="nav-tab">Functionality</a>
  <a id="display-tab" class="nav-tab">Display</a>
</h2>
<?php
$nav = preg_replace('/^\s+|\n|\r|\s+$/m', '', ob_get_contents());


ob_end_clean();
?>
<script>
    jQuery(document).ready(function($) {
        jQuery('#edittag').prepend('<?php echo $nav; ?>');
        jQuery('.wrap>h2').text('General wxSlider Settings');
        jQuery('.func-tab').hide();
        jQuery('.general-tab').hide(); 
    });
</script>

<script>
    jQuery(document).ready(function($) {
        jQuery(document).on('click', '#general-tab', function(event) {
            jQuery('.nav-tab').removeClass('nav-tab-active');
            jQuery('.wrap>h2').text('General wxSlider Settings');
            jQuery(this).addClass('nav-tab-active');
            jQuery('.form-field').fadeIn();
            jQuery('.func-tab').fadeOut();
            jQuery('.general-tab').fadeOut();

        });
        jQuery(document).on('click', '#func-tab', function(event) {
            jQuery('.nav-tab').removeClass('nav-tab-active');
            jQuery('.wrap>h2').text('Functionality wxSlider Settings');
            jQuery(this).addClass('nav-tab-active');
            jQuery('.func-tab').fadeIn();
            jQuery('.form-field').fadeOut();
            jQuery('.general-tab').fadeOut();
        });
        jQuery(document).on('click', '#display-tab', function(event) {
            jQuery('.nav-tab').removeClass('nav-tab-active');
            jQuery('.wrap>h2').text('Display wxSlider Settings');
            jQuery(this).addClass('nav-tab-active');
            jQuery('.general-tab').fadeIn();
            jQuery('.form-field').fadeOut();
            jQuery('.func-tab').fadeOut();
        });
    });
</script>
<?php
}

