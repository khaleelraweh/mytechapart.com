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
            
            // Replace template links with url()
            $content = preg_replace('/href="(?:\.\.\/)+(?:vertical|horizontal)-menu-template(-[a-z]+)?\/?([^"]*)"/', 'href="{{ url(\'$2\') }}"', $content);
            
            // Also replace bare HTML links that weren't caught
            $content = preg_replace('/href="([a-zA-Z0-9-]+\.html)(#[^"]*)?"/', 'href="{{ url(\'$1\') }}$2"', $content);

            file_put_contents($path, $content);
            echo "Processed again: $path\n";
        }
    }
}
