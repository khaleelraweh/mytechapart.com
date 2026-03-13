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
            
            // Revert data-app-light-img="{{ asset('frontend/img/...') }}" to data-app-light-img="..."
            $content = preg_replace('/data-app-(light|dark)-img="\{\{ asset\(\'(?:frontend|assets)\/img\/([^\']+)\'\) \}\}"/', 'data-app-$1-img="$2"', $content);
            
            // Just in case it was modified but hasn't had the {{ asset(...) }} applied,
            // like data-app-light-img="frontend/img/front-pages/landing-page/hero-dashboard-light.png"
            $content = preg_replace('/data-app-(light|dark)-img="(?:frontend|assets)\/img\/([^"]+)"/', 'data-app-$1-img="$2"', $content);

            file_put_contents($path, $content);
            echo "Fixed data-app-img in: $path\n";
        }
    }
}
