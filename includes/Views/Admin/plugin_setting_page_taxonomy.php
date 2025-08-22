<div class="wrap">
    <h1><?php echo __( $this->plugin_setting_page_text, 'advanced-taxonomy-image-banner' );?></h1>
    <p><?php echo __( 'Add a taxonomies slug for the main image and banner images option? Additionally, it would be helpful if we could have the ability to add custom taxonomies slugs as well.', 'advanced-taxonomy-image-banner' );?></p>
    <hr />
    <form method="post" action="">
        <?php wp_nonce_field('atbi_save_settings', 'atbi_settings_nonce'); ?>
        <table class="form-table">
            <tr>
                <th scope="row" style="width: 25%;">
                    <label for="atib-get-taxnomies-slug-id">
                        <?php _e('Main Image Taxonomy Slug ( with "|" ):', 'advanced-taxonomy-image-banner'); ?>
                    </label>
                </th>
                <td>
                    <textarea id="atib-get-taxnomies-slug-id"  name="get_taxonomies_slug" rows="5" cols="50" class="large-text" placeholder="<?php esc_attr_e( 'Add Taxonomies Slug with "|" seprater', 'advanced-taxonomy-image-banner'); ?>"><?php echo esc_textarea( $this->get_taxonomies_slug != '' ? $this->get_taxonomies_slug : '' );?></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row" style="width: 25%;">
                    <label for="atib-get-taxnomies-slug-id">
                        <?php _e('Banner Images Taxonomy Slug ( with "|" ):', 'advanced-taxonomy-image-banner'); ?>
                    </label>
                </th>
                <td>
                    <textarea id="atib-get-taxnomies-slug-id"  name="get_banner_taxonomies_slug" rows="5" cols="50" class="large-text" placeholder="<?php esc_attr_e( 'Add Taxonomies Slug with "|" seprater', 'advanced-taxonomy-image-banner'); ?>"><?php echo esc_textarea( $this->get_banner_taxonomies_slug != '' ? $this->get_banner_taxonomies_slug : '' );?></textarea>
                </td>
            </tr>
        </table>
        <?php submit_button(__('Save Settings', 'advanced-taxonomy-image-banner')); ?>
    </form>
    <hr />
    <h1><?php echo __( 'Help', 'advanced-taxonomy-image-banner' );?></h1>
</div>