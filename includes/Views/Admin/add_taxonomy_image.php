<div class="form-field term-group">
    <div class="taxonomy-image-control">
        <label for="taxonomy-image-id" class="taxonomy-image-label"><?php _e('Main Image', 'text-domain'); ?></label>
        
        <div class="taxonomy-image-preview-wrapper">
            <div id="taxonomy-image-wrapper" class="taxonomy-image-preview"></div>
        </div>
        
        <div class="taxonomy-image-actions">
            <input type="hidden" id="taxonomy-image-id" name="taxonomy-image-id" class="custom_media_url" value="">
            
            <button type="button" class="button button-secondary taxonomy_media_button components-button is-secondary" id="taxonomy_media_button" name="taxonomy_media_button">
                <span class="dashicons dashicons-format-image"></span>
                <?php _e('Add Image', 'text-domain'); ?>
            </button>
            
            <button type="button" class="button button-secondary taxonomy_media_remove components-button is-destructive" id="taxonomy_media_remove" name="taxonomy_media_remove">
                <span class="dashicons dashicons-trash"></span>
                <?php _e('Remove Image', 'text-domain'); ?>
            </button>
        </div>
    </div>
</div>