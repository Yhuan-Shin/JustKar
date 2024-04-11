<?php
function run(string $url, array $routes):void
{
    $url = parse_url($url);
    $path = $url['path'];
    if(false == array_key_exists($path, $routes)){
        return;
    }
    $callback = $routes[$path];
    $callback();
}
?>