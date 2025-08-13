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