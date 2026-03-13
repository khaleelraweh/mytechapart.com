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
        
        // Rename .html to .blade.php
        if (substr($path, -5) === '.html') {
            $newPath = substr($path, 0, -5) . '.blade.php';
            rename($path, $newPath);
            $path = $newPath;
        }

        if (is_file($path) && substr($path, -10) === '.blade.php') {
            $content = file_get_contents($path);
            
            // Replace css/js assets
            $content = preg_replace('/href="(?:\.\.\/)+assets\//', 'href="{{ asset(\'assets/', $content);
            $content = preg_replace('/href="assets\//', 'href="{{ asset(\'assets/', $content);
            $content = preg_replace('/src="(?:\.\.\/)+assets\//', 'src="{{ asset(\'assets/', $content);
            $content = preg_replace('/src="assets\//', 'src="{{ asset(\'assets/', $content);
            
            // Close the asset helper correctly if not closed
            $content = preg_replace('/(href="{{ asset\(\'assets\/[^"]+)"/', '$1\') }}"', $content);
            $content = preg_replace('/(src="{{ asset\(\'assets\/[^"]+)"/', '$1\') }}"', $content);

            // Also for images in data attributes
            $content = preg_replace('/data-app-light-img="front-pages\//', 'data-app-light-img="{{ asset(\'assets/img/front-pages/', $content);
            $content = preg_replace('/(data-app-light-img="{{ asset\(\'assets\/img\/front-pages\/[^"]+)"/', '$1\') }}"', $content);
            
            $content = preg_replace('/data-app-dark-img="front-pages\//', 'data-app-dark-img="{{ asset(\'assets/img/front-pages/', $content);
            $content = preg_replace('/(data-app-dark-img="{{ asset\(\'assets\/img\/front-pages\/[^"]+)"/', '$1\') }}"', $content);

            // Replace intra-page links
            // e.g. landing-page.html#landingContact => {{ url('landing-page') }}#landingContact
            $content = preg_replace('/href="([a-zA-Z0-9-]+)\.html(#[^"]*)?"/', 'href="{{ url(\'$1\') }}$2"', $content);

            // Replace other image tags that didn't have an exact matching path
            $content = preg_replace('/href="(?:\.\.\/)+(.*?\.(?:png|jpg|jpeg|gif|ico|svg|css))"/', 'href="{{ asset(\'$1\') }}"', $content);
            $content = preg_replace('/src="(?:\.\.\/)+(.*?\.(?:png|jpg|jpeg|gif|ico|svg|js))"/', 'src="{{ asset(\'$1\') }}"', $content);

            file_put_contents($path, $content);
            echo "Processed: $path\n";
        }
    }
}
