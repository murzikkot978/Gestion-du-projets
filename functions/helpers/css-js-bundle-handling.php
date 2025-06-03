<?php

function enqueue_css($file_name, $enqueue_name)
{
     if (!is_admin()) :
          if (isset($file_name) && $file_name && isset($enqueue_name) && $enqueue_name) :
               $CSSbundleDir = get_template_directory() . '/dist/css/';
               if (file_exists($CSSbundleDir)) :
                    $CSSBundleFiles = glob($CSSbundleDir . '*');
                    $CSSFilesArray = array();
                    if ($CSSBundleFiles) :
                         foreach ($CSSBundleFiles as $CSSBundleFile) :
                              $CSSBundleFileName = basename($CSSBundleFile, '');
                              $CSSFilesArray[] = $CSSBundleFileName;
                         endforeach;
                    endif;
                    if ($CSSFilesArray) :
                         $CSSBundleFile = preg_grep('/(' . $file_name . '.*.css)/', $CSSFilesArray);
                         if ($CSSBundleFile) :
                              $CSSBundleFile = implode(array_slice($CSSBundleFile, 0, 1));
                              wp_enqueue_style($enqueue_name, get_template_directory_uri() . '/dist/css/' . $CSSBundleFile, array());
                         endif;
                    endif;
               endif;
          endif;
     endif;
}


function enqueue_js($file_name, $enqueue_name)
{
     if (!is_admin()) :
          if (isset($file_name) && $file_name && isset($enqueue_name) && $enqueue_name) :
               $JSbundleDir = get_template_directory() . '/dist/js/';
               if (file_exists($JSbundleDir)) :
                    $JSBundleFiles = glob($JSbundleDir . '*');
                    $JSFilesArray = array();
                    if ($JSBundleFiles) :
                         foreach ($JSBundleFiles as $JSBundleFile) :
                              $JSBundleFileName = basename($JSBundleFile, '');
                              $JSFilesArray[] = $JSBundleFileName;
                         endforeach;
                    endif;
                    if ($JSFilesArray) :
                         $JSBundleFile = preg_grep('/(' . $file_name . '.*.js)/', $JSFilesArray);
                         if ($JSBundleFile) :

                              $JSBundleFile = implode(array_slice($JSBundleFile, 0, 1));
                              wp_enqueue_script($enqueue_name, get_template_directory_uri() . '/dist/js/' . $JSBundleFile, array(), false, true);
                         endif;
                    endif;
               endif;
          endif;
     endif;
}
