<?php

add_action('acf/init', function () {
     if (function_exists('acf_register_block')) {
          $dir = new RecursiveDirectoryIterator(locate_template("template-parts/gutenberg-blocks/"));

          $iterator = new RecursiveIteratorIterator($dir);
          $regex = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
          $pathArray = (iterator_to_array($regex));
          foreach ($pathArray as $fileinfo) {
               $file_path = ($fileinfo[0]);
               $slug = str_replace('.php', '', basename($file_path));
               $file_headers = get_file_data($file_path, [
                    'title' => 'Title',
                    'description' => 'Description',
                    'category' => 'Category',
                    'icon' => 'Icon',
                    'keywords' => 'Keywords',
                    'post_type' => 'Post type'
               ]);
               // die if there are missing vital categories.
               $required_headers = ['title', 'category'];
               foreach ($required_headers as $header) {
                    if (empty($file_headers[$header])) {
                         die(_e('This block needs a ' . $header . ': ' . $file_path));
                    }
               }

               $datas = [
                    'name' => $slug,
                    'title' => $file_headers['title'],
                    'description' => $file_headers['description'],
                    'category' => $file_headers['category'],
                    'icon' => $file_headers['icon'],
                    'keywords' => explode(' ', $file_headers['keywords']),
                    'render_template' => $file_path,
                    // 'render_callback' => 'my_acf_block_render_callback',
                    'mode' => 'edit',
                    //  'supports' => array('mode' => false)
               ];

               $post_types = array_filter(explode(' ', $file_headers['post_type']));
               if (count($post_types) > 0) $datas['post_types'] = $post_types;
               acf_register_block($datas);
          }
     }
});
