<?php

// Add the fields to the "wxsliders" taxonomy, using our callback function  
add_action( 'wxsliders_edit_form_fields', 'wxsliders_taxonomy_custom_fields', 10, 2 );  

// Save the changes made on the "slideshows" taxonomy, using our callback function  
add_action( 'edited_wxsliders', 'save_taxonomy_custom_fields_wxsliders', 10, 2 );  
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
            <label for="term_meta[wxslider_auto]"><?php  _e( 'Automatic Animation', 'wobble' ); ?></label>  
        </th>  
        <td> 
            <input type="text" class="wxslider_auto" name="term_meta[wxslider_auto]" id="term_meta[wxslider_auto]" value="<?php echo $term_meta['wxslider_auto'] ? $term_meta['wxslider_auto'] : ''; ?>">
            <p class="description">
                Echo some text
            </p>
        </td>  
    </tr>

<tr class="display-tab">  
    <th scope="row" valign="top">  
        <label for="term_meta[wxslider_chevron_left]"><?php  _e( 'Chevron Style', 'wobble' ); ?></label>  
    </th>  
    <td> 
    <label for="term_meta[wxslider_chevron_left]"><strong><?php _e( 'Previous Button', 'wobble' ); ?></strong></label> <br> 
    <input type="text" class="left_chev_picker" style="width:320px;" name="term_meta[wxslider_chevron_left]" id="term_meta[wxslider_chevron_left]" value="<?php echo $term_meta['wxslider_chevron_left'] ? $term_meta['wxslider_chevron_left'] : ' '; ?>">
<p class="description">
Icon For previous slide (leave empty for default chevron icon).
</p>
    <label for="term_meta[wxslider_chevron_right]"><strong><?php _e( 'Next Button', 'wobble' ); ?></strong></label> <br> 
    <input type="text" class="right_chev_picker" style="width:320px;" name="term_meta[wxslider_chevron_right]" id="term_meta[wxslider_chevron_right]" value="<?php echo $term_meta['wxslider_chevron_right'] ? $term_meta['wxslider_chevron_right'] : ''; ?>">
<p class="description">
Icon For next slide (leave empty for default chevron icon).
</p>
    </td>  
</tr>

<tr class="display-tab"> 
    <th scope="row" valign="top">  
        <label for="term_meta[wxslider_height]"><?php _e( 'Image Height', 'wobble' ); ?></label>  
    </th>  
    <td> 
<input type="number" name="term_meta[wxslider_height]"  id="term_meta[wxslider_height]" value="<?php echo $term_meta['wxslider_height'] ? $term_meta['wxslider_height'] : ''; ?>">
<p class="description">
  Height of the Image, in px
</p>
    </td>  
</tr>
<tr class="display-tab"> 
    <th scope="row" valign="top">  
        <label for="term_meta[wxslider_number]"><?php _e( 'Number of Slides', 'wobble' ); ?></label>  
    </th>  
    <td> 
<input type="number" min="1" max="5" name="term_meta[wxslider_number]"  id="term_meta[wxslider_number]" value="<?php echo $term_meta['wxslider_number'] ? $term_meta['wxslider_number'] : ''; ?>">
<p class="description">
 Number of wxSlides to be displayed at one time.
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
            jQuery('.display-tab').fadeOut();

        });
        jQuery(document).on('click', '#func-tab', function(event) {
            jQuery('.nav-tab').removeClass('nav-tab-active');
            jQuery('.wrap>h2').text('Functionality wxSlider Settings');
            jQuery(this).addClass('nav-tab-active');
            jQuery('.func-tab').fadeIn();
            jQuery('.form-field').fadeOut();
            jQuery('.display-tab').fadeOut();
        });
        jQuery(document).on('click', '#display-tab', function(event) {
            jQuery('.nav-tab').removeClass('nav-tab-active');
            jQuery('.wrap>h2').text('Display wxSlider Settings');
            jQuery(this).addClass('nav-tab-active');
            jQuery('.display-tab').fadeIn();
            jQuery('.form-field').fadeOut();
            jQuery('.func-tab').fadeOut();
        });
    });
</script>
<script>   
function loadjscssfile(filename, filetype){
    if (filetype=="js"){ //if filename is a external JavaScript file
        var fileref=document.createElement('script')
        fileref.setAttribute("type","text/javascript")
        fileref.setAttribute("src", filename)
    }
    else if (filetype=="css"){ //if filename is an external CSS file
        var fileref=document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)
    }
    if (typeof fileref!="undefined")
        document.getElementsByTagName("head")[0].appendChild(fileref)
}
    jQuery(document).ready(function($) {

            loadjscssfile("//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css", "css"); 
                    
jQuery('.right_chev_picker').iconpicker({placement:'topRight',});

jQuery('.left_chev_picker').iconpicker({placement:'topRight',});

});
</script>
<?php
}

