<?php

$dirs = [
    'c:/xampp/htdocs/FuadNazel/resources/views/frontend',
    'c:/xampp/htdocs/FuadNazel/resources/views/backend'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) continue;
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $path = $dir . '/' . $file;
        
        if (is_file($path) && substr($path, -10) === '.blade.php') {
            $content = file_get_contents($path);
            
            // Replace assets/img/front-pages/branding with frontend/img/front-pages/branding
            $content = preg_replace('/\{\{ asset\(\'assets\/(img\/front-pages\/branding\/[^\']+)\'\) \}\}/', '{{ asset(\'frontend/$1\') }}', $content);
            
            // Re-replace frontend assets if they had frontend base folder
            $content = preg_replace('/src="frontend\/(img\/front-pages\/branding\/[^"]+)"/', 'src="{{ asset(\'frontend/$1\') }}"', $content);
            
            file_put_contents($path, $content);
            echo "Processed branding for: $path\n";
        }
    }
}
