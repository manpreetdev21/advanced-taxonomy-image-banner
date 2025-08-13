<tr class="form-field term-group-wrap">
    <th scope="row">
        <label for="taxonomy-image-id"><?php _e('Category Image', 'text-domain'); ?></label>
    </th>
    <td>
        <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" value="<?php echo esc_attr($image_id); ?>">
        <div id="taxonomy-image-wrapper">
            <?php if( !empty( $image_id ) ) : ?>
                <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
            <?php endif; ?>
        </div>
        <p>
            <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="<?php _e('Add Image', 'text-domain'); ?>" />
            <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="<?php _e('Remove Image', 'text-domain'); ?>" />
        </p>
    </td>
</tr>