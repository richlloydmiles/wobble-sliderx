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
edittag