<?php
if (!function_exists('langUrl')) {
    function langUrl($url) {
        $separator = str_contains($url, '?') ? '&' : '?';
        return $url . $separator . 'lang=' . app()->getLocale();
    }
}
