<tr class="form-field term-banner-thumbnail-wrap">
    <th scope="row" valign="top"><label><?php esc_html_e('Banner Images', 'advanced-taxonomy-image-banner'); ?></label></th>
    <td>
        <div class="banner-slider-container" id="atbi-banner-container">
            <?php foreach ($this->banner_sliders as $index => $banner_slider): ?>
                <div class="banner-slider-item">
                    <div class="taxonomy-banner-image-preview-wrapper" style="float: left; margin-right: 10px;">
                        <div class="taxonomy-banner-image-preview">
                            <img src="<?php echo $banner_slider ? wp_get_attachment_image_url($banner_slider, 'thumbnail') : ''; ?>" style="<?php echo empty($banner_slider) ? 'display: none;' : ''; ?>">
                        </div>
                    </div>

                    <div class="taxonomy-banner-image-actions">
                        <input type="hidden" class="image_attachment_banner_id" name="taxonomy-banner-image-id[]" value="<?php echo esc_attr($banner_slider); ?>">
                        
                        <button type="button" class="button button-secondary taxonomy_media_banner_button components-button is-secondary">
                            <span class="dashicons dashicons-format-image"></span>
                            <?php _e('Add Image', 'advanced-taxonomy-image-banner'); ?>
                        </button>
                        
                        <button type="button" class="button button-secondary taxonomy_media_banner_remove components-button is-destructive" <?php echo empty($banner_slider) ? 'style="display: none;"' : ''; ?>>
                            <span class="dashicons dashicons-trash"></span>
                            <?php _e('Remove Image', 'advanced-taxonomy-image-banner'); ?>
                        </button>
                        
                        <?php if ($index > 0): ?>
                            <button type="button" class="button button_remove_banner_button">
                                <span class="dashicons dashicons-trash"></span>
                                <?php _e('Remove Banner', 'advanced-taxonomy-image-banner'); ?>
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <button type="button" class="button add_new_banner_button">
            <span class="dashicons dashicons-plus"></span>
            <?php esc_html_e('Add New Banner', 'advanced-taxonomy-image-banner'); ?>
        </button>
    </td>
</tr>