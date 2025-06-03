<?

/**
 * Generate an HTML image element for a given attachment ID.
 *
 * This function retrieves the image HTML markup for a specific WordPress attachment ID.
 * It uses the `wp_get_attachment_image` function to obtain the image tag.
 *
 * @param int $attachment_id The ID of the image attachment in the WordPress media library.
 * @param string $size The size of the image to be retrieved. Default is 'full'. 
 *                     Other common sizes include 'thumbnail', 'medium', 'large', etc.
 * @param array $attributes Optional. An array of additional attributes to add to the image tag.
 *                          Example: ['class' => 'custom-class', 'alt' => 'Custom Alt Text']
 *
 * @return string The HTML img element string for the specified attachment ID and size.
 *
 * Usage Example:
 * echo get_img_element(42, 'medium', ['class' => 'img-responsive', 'alt' => 'Descriptive alt text']);
 */
function get_img_element($attachment, $size = 'full',  $attributes = [])
{
     $attachment_id = $attachment["ID"];
     $attributes = array_merge($attributes);
     return wp_get_attachment_image($attachment_id, $size, false, $attributes);
}
