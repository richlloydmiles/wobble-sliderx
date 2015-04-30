<?php

// Add the fields to the "slideshows" taxonomy, using our callback function  
add_action( 'slideshows_edit_form_fields', 'slideshows_taxonomy_custom_fields', 10, 2 );  
  
// Save the changes made on the "slideshows" taxonomy, using our callback function  
add_action( 'edited_slideshows', 'save_taxonomy_custom_fields', 10, 2 );  
// A callback function to add a custom field to our "slideshows" taxonomy  
function slideshows_taxonomy_custom_fields($tag) {  
   // Check for existing taxonomy meta for the term you're editing  
    $t_id = $tag->term_id; // Get the ID of the term you're editing  
    $term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check  
?>
<tr class="form-field wobble_functionality">  
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
}
// A callback function to save our extra taxonomy field(s)  
function save_taxonomy_custom_fields( $term_id ) {  
    if ( isset( $_POST['term_meta'] ) ) {  
        $t_id = $term_id;  
        $term_meta = get_option( "taxonomy_term_$t_id" );  
        $cat_keys = array_keys( $_POST['term_meta'] );  
            foreach ( $cat_keys as $key ){  
            if ( isset( $_POST['term_meta'][$key] ) ){  
                $term_meta[$key] = $_POST['term_meta'][$key];  
            }  
        }  
        //save the option array  
        update_option( "taxonomy_term_$t_id", $term_meta );  
    }  
}  
