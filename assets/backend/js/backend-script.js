jQuery(document).ready(function($) {
    // Only run if our elements exist on the page and wp.media is available
    if ($('#taxonomy-image-wrapper').length && typeof wp !== 'undefined' && wp.media) {
        // Uploading files
        var file_frame;
        
        $('#taxonomy_media_button').on('click', function(event) {
            event.preventDefault();
            
            // If the media frame already exists, reopen it.
            if (file_frame) {
                file_frame.open();
                return;
            }
            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: 'Select Category Image',
                button: {
                    text: 'Use as Category Image',
                },
                multiple: false
            });
            
            // When an image is selected, run a callback.
            file_frame.on('select', function() {
                var attachment = file_frame.state().get('selection').first().toJSON();
                $('#taxonomy-image-id').val(attachment.id);
                $('#taxonomy-image-wrapper').html('<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>');
                // Add class to indicate image is present
                $('#taxonomy-image-wrapper').addClass('has-image');
            });
            
            // Finally, open the modal
            file_frame.open();
        });
        
        $('#taxonomy_media_remove').on('click', function(event) {
            event.preventDefault();
            $('#taxonomy-image-id').val('');
            $('#taxonomy-image-wrapper').html('').removeClass('has-image');
        });
        
        // Add class on page load if image already exists
        if ($('#taxonomy-image-wrapper').find('img').length > 0) {
            $('#taxonomy-image-wrapper').addClass('has-image');
        }
    }
});

/* Banner images */
jQuery(document).ready(function($) {
   // Add new banner
    $(document).on('click', '.add_new_banner_button', function() {
        var $container = $('.banner-slider-container');
        var $firstItem = $container.find('.banner-slider-item').first();
        
        if ($firstItem.length) {
            var $clone = $firstItem.clone();
            $clone.find('.image_attachment_banner_id').val('');
            $clone.find('.button_remove_image_button').hide();
            $clone.find('.button_remove_banner_button').remove();
            $clone.append('<button type="button" class="button button_remove_banner_button"><span class="dashicons dashicons-trash"></span></button>');
            $container.append($clone);
        }
    });

    // Remove banner
    $(document).on('click', '.button_remove_banner_button', function() {
        $(this).closest('.banner-slider-item').remove();
    });

    // Image upload
    $(document).on('click', '.taxonomy_media_banner_button', function(e) {
        e.preventDefault();
        var $button = $(this);
        var $input = $button.siblings('.image_attachment_banner_id');
        var $img = $button.closest('.banner-slider-item').find('img');

        // Create media frame
        var frame = wp.media({
            title: 'Select or Upload Banner Image',
            button: { text: 'Use this image' },
            multiple: false
        });

        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            console.log($input);
            $input.val(attachment.id);
            $('.taxonomy-image-preview').html('<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>');
            // Add class to indicate image is present
            $('.taxonomy-image-preview').addClass('has-image');
            $img.attr('src', attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url);
            $button.siblings('.taxonomy_media_banner_remove').show();
        });

        frame.open();
    });

    // Image remove
    $(document).on('click', '.taxonomy_media_banner_remove', function(e) {
        e.preventDefault();
        var $button = $(this);
        $button.siblings('.image_attachment_id').val('');
        $button.hide();
    });
});