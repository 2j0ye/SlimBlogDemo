<?php

/**
 * Get the Primary Menu Items
 */
function menuGetPrimaryItems() {
    $items = array();
    $items[] = array('title' => 'Home', 'url' => '/');
    $items[] = array('title' => 'Blog', 'url' => '/Blog');
    $items[] = array('title' => 'Archive', 'url' => '/Archive');

    return menuPrepareItems($items);
}

/**
 * Prepare Menu Item Before render
 */
function menuPrepareItems(&$items) {
    foreach ($items as &$item) {
        $item['active'] = menuItemIsActive($item['url']) ? 'active' : 'inactive';
    }

    return $items;
}

/**
 * Tell us if a Menu Item is Active or not
 */
function menuItemIsActive($string) {
    $first_url_part = menuGetFirstUrlPart();

    return ($first_url_part === $string);
}

/**
 * Get the first part of the URL, with a "/" before
 */
function menuGetFirstUrlPart() {
    $request_uri = Slim_Http_Uri::getUri();
    $url_parts = explode('/', $request_uri);
    array_shift($url_parts);

    return '/'. $url_parts[0];
}