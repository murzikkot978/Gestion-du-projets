<?php

// this recursive iterator parses every php file
// under template-parts/gutenberg-blocks in order to register them.
add_filter('allowed_block_types_all', 'allow_acf_blocks');
function allow_acf_blocks()
{
     $allowed_blocks = [];

     if (function_exists('acf_register_block')) {

          /* ALLOW EVERY CUSTOM BLOCKS */
          $dir = new RecursiveDirectoryIterator(locate_template("template-parts/gutenberg-blocks/"));

          $iterator = new RecursiveIteratorIterator($dir);
          $regex = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
          $pathArray = (iterator_to_array($regex));

          foreach ($pathArray as $fileinfo) {
               $file_path = ($fileinfo[0]);
               $slug = str_replace('.php', '', basename($file_path));
               $allowed_blocks[] = 'acf/' . $slug;
          }

          /* ALLOW SOME BASE BLOCKS */
          $allowed_blocks[] = 'core/freeform';
     }

     return $allowed_blocks;
}
