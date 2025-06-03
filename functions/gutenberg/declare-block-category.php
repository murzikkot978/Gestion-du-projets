<?php
// This is used to split blocks in different categories in the wp page editor.
function new_block_category($categories, $post)
{
     return array_merge(
          $categories,
          array(
               array(
                    'slug'  => 'section',
                    'title' => __('Section', 'Admin'),
               ),
               array(
                    'slug'  => 'loop',
                    'title' => __('Loop', 'Admin'),
               ),
          )
     );
}

add_filter('block_categories_all', 'new_block_category', 10, 2);
