<div class="form-field term-banner-thumbnail-wrap">
    <label for="dwtbs_banner_slider"><?php esc_html_e( 'Banner Images', 'taxonomy-banner-slider' ); ?></label>
    <div class="banner-slider-container">
        <div class="banner-slider-item">
            <div class="product_cat_thumbnail" style="float: left; margin-right: 10px;">
                <img src="<?php echo esc_url(wc_placeholder_img_src()); ?>" width="60px" height="60px">
            </div>
            <div>
                <input type="hidden" class="image_attachment_id" name="dwtbs_banner_slider[]">
                <button type="button" class="button upload_image_button"><?php esc_html_e('Upload/Add image', 'taxonomy-banner-slider'); ?></button>
                <button type="button" class="button remove_image_button" style="display: none;"><?php esc_html_e('Remove image', 'taxonomy-banner-slider'); ?></button>
            </div>
        </div>
    </div>
    <div class="clear" style="margin-top:10px;"></div>
    <button type="button" class="button add_new_banner_button"><span class="dashicons dashicons-plus"></span><?php esc_html_e('Add New Banner', 'taxonomy-banner-slider'); ?></button>
</div>