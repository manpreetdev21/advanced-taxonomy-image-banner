<div class="form-field term-group">
    <label for="atib_banner_slider" class="taxonomy-image-label"><?php esc_html_e( 'Banner Images', 'advanced-taxonomy-image-banner' ); ?></label>
    
    <div class="banner-slider-container">
        <div class="banner-slider-item">
            <div class="taxonomy-image-preview-wrapper">
                <div class="taxonomy-image-preview"></div>
            </div>
            
            <div class="taxonomy-image-actions">
                <input type="hidden" class="image_attachment_id" name="taxonomy-banner-image-id[]" value="">
                
                <button type="button" class="button button-secondary taxonomy_media_banner_button components-button is-secondary" id="taxonomy_media_button" name="taxonomy_media_button">
                    <span class="dashicons dashicons-format-image"></span>
                    <?php _e('Add Image', 'advanced-taxonomy-image-banner'); ?>
                </button>
                
                <button type="button" class="button button-secondary taxonomy_media_banner_remove components-button is-destructive" id="taxonomy_media_remove" name="taxonomy_media_remove">
                    <span class="dashicons dashicons-trash"></span>
                    <?php _e('Remove Image', 'advanced-taxonomy-image-banner'); ?>
                </button>
            </div>
        </div>
    </div>
    
    <div class="clear"></div>
    
    <button type="button" class="button add_new_banner_button">
        <span class="dashicons dashicons-plus"></span>
        <?php esc_html_e('Add New Banner', 'advanced-taxonomy-image-banner'); ?>
    </button>
</div>