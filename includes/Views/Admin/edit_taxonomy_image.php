<tr class="form-field term-group-wrap">
    <th scope="row">
        <label for="taxonomy-image-id" class="taxonomy-image-label"><?php _e('Main Image', 'advanced-taxonomy-image-banner'); ?></label>
    </th>
    <td>
        <div class="taxonomy-image-control">
            <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr( $this->image_id ); ?>">
            
            <div class="taxonomy-image-preview-wrapper">
                <div id="taxonomy-image-wrapper" class="taxonomy-image-preview<?php echo !empty($image_id) ? ' has-image' : ''; ?>">
                    <?php if( !empty( $this->image_id ) ): ?>
                        <?php echo wp_get_attachment_image( $this->image_id, 'thumbnail', false, array('class' => 'taxonomy-thumbnail')); ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="taxonomy-image-actions">
                <button type="button" class="button button-secondary taxonomy_media_button components-button is-secondary" id="taxonomy_media_button" name="taxonomy_media_button">
                    <span class="dashicons dashicons-format-image"></span>
                    <?php _e('Add Image', 'advanced-taxonomy-image-banner'); ?>
                </button>
                
                <button type="button" class="button button-secondary taxonomy_media_remove components-button is-destructive" id="taxonomy_media_remove" name="taxonomy_media_remove">
                    <span class="dashicons dashicons-trash"></span>
                    <?php _e('Remove Image', 'advanced-taxonomy-image-banner'); ?>
                </button>
            </div>
        </div>
    </td>
</tr>