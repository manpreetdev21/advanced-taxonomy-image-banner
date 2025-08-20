<div class="wrap">
    <?php //echo "<pre>";var_dump($this);?>
    <h1><?php echo __( $this->plugin_setting_page_text, 'advanced-taxonomy-image-banner' );?></h1>
    </hr>
    <form method="post" action="">
        <?php wp_nonce_field('ati_save_settings', 'ati_settings_nonce'); ?>

        <table class="form-table">
            <tr>
                <th scope="row" style="width: 25%;">
                    <label for="atib-get-taxnomies-slug-id">
                        <?php _e('Add Taxonomies Slug with "|" seprater:', 'advanced-taxonomy-image-banner'); ?>
                    </label>
                </th>
                <td>
                    <textarea id="atib-get-taxnomies-slug-id"  name="get_taxnomies_slug" rows="5" cols="50" class="large-text" placeholder="<?php esc_attr_e( 'Add Taxonomies Slug with "|" seprater', 'advanced-taxonomy-image-banner'); ?>"><?php echo ( $this->get_taxnomies_slug != '' ? $this->get_taxnomies_slug : '' );?></textarea>
                </td>
            </tr>
        </table>
        <?php submit_button(__('Save Settings', 'advanced-taxonomy-image-banner')); ?>
    </form>

</div>