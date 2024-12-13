<?php

class Route {

    // VARS

    public static $path = '';
    public static $q = [];

    // GENERAL

    public static function init() {
        Route::info();
        Route::route_common();
    }

    private static function info() {
        // vars
        $url = $_SERVER['REQUEST_URI'];
        // formatting
        if (substr($url, 0, 1) == '/') $url = substr($url, 1);
        $url = explode('?', $url);
        Route::$path = $url[0] ?? '';
        Route::$path = Route::$path ? flt_input(Route::$path) : 'plots';
        if (isset($url[1])) parse_str($url[1], $tmp);
        // escape data
        if (isset($tmp)) {
            foreach ($tmp as $key => $value) {
                $key = flt_input($key);
                $value = flt_input($value);
                Route::$q[$key] = $value;
            }
        }
    }

    // ROUTES

    private static function route_common() {
        if (Session::$access != 1) return controller_login();

        switch (Route::$path) {
            case 'logout': return Session::logout();
            case 'plots': return controller_plots();
            case 'users': return controller_users();
            default: throw new \http\Exception\BadUrlException();
        }
    }

    public static function route_call($path, $act, $data) {
        // routes
        switch ($path) {
            case 'auth': return controller_auth($act, $data);
            case 'plot': return controller_plot($act, $data);
            case 'user': return controller_user($act, $data);
            case 'search': return controller_search($act, $data);
            default: return [];
        }
    }

}
