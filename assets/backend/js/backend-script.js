jQuery(document).ready(function($) {
    if ($('#taxonomy-image-wrapper').length && typeof wp !== 'undefined' && wp.media) {
        var file_frame;        
        $('#taxonomy_media_button').on('click', function(event) {
            event.preventDefault();
            
            if (file_frame) {
                file_frame.open();
                return;
            }
            
            file_frame = wp.media.frames.file_frame = wp.media({
                title: 'Select Category Image',
                button: {
                    text: 'Use as Category Image',
                },
                multiple: false
            });
            
            file_frame.on('select', function() {
                var attachment = file_frame.state().get('selection').first().toJSON();
                $('#taxonomy-image-id').val(attachment.id);
                $('#taxonomy-image-wrapper').html('<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>');
                // Add class to indicate image is present
                $('#taxonomy-image-wrapper').addClass('has-image');
            });
            file_frame.open();
        });
        
        $('#taxonomy_media_remove').on('click', function(event) {
            event.preventDefault();
            $('#taxonomy-image-id').val('');
            $('#taxonomy-image-wrapper').html('').removeClass('has-image');
        });
        
        if ($('#taxonomy-image-wrapper').find('img').length > 0) {
            $('#taxonomy-image-wrapper').addClass('has-image');
        }
    }
});

/* Banner images */
jQuery(document).ready(function($) {
    if ($('.taxonomy-banner-image-preview').length && typeof wp !== 'undefined' && wp.media) {
        $(document).on('click', '.add_new_banner_button', function() {
            var $container = $('.banner-slider-container');
            var $firstItem = $container.find('.banner-slider-item').first();
            
            if ($firstItem.length) {
                var $clone = $firstItem.clone();
                
                $clone.find('.image_attachment_banner_id').val('');
                $clone.find('.taxonomy-banner-image-preview').html('');
                $clone.find('.taxonomy_media_banner_remove').hide();
                
                $clone.append('<button type="button" class="button button_remove_banner_button"><span class="dashicons dashicons-trash"></span></button>');
                $container.append($clone);
            }
        });
        
        $(document).on('click', '.button_remove_banner_button', function() {
            $(this).closest('.banner-slider-item').remove();
        });
        
        $(document).on('click', '.taxonomy_media_banner_button', function(e) {
            e.preventDefault();
            var $button = $(this);
            var $item = $button.closest('.banner-slider-item');
            var $input = $item.find('.image_attachment_banner_id');
            var $preview = $item.find('.taxonomy-banner-image-preview');
            var $removeBtn = $item.find('.taxonomy_media_banner_remove');
            
            var frame = wp.media({
                title: 'Select or Upload Banner Image',
                button: { text: 'Use this image' },
                multiple: false
            });

            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $input.val(attachment.id);
                $preview.html('<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>');
                
                $removeBtn.show();
            });

            frame.open();
        });
        
        $(document).on('click', '.taxonomy_media_banner_remove', function(e) {
            e.preventDefault();
            var $button = $(this);
            var $item = $button.closest('.banner-slider-item');
            
            $item.find('.image_attachment_banner_id').val('');
            $item.find('.taxonomy-banner-image-preview').html('');
            $button.hide();
        });
    }    
});