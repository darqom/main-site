<?php

use App\Helpers\OptionHelper;

if(!function_exists('option')) {
    /**
     * Get an option value from database
     * 
     * @param string|null $key
     * @param string|null $value
     * @param bool $putMode
     * @return \App\Helpers\OptionHelper|null|string
     */
    function option($key = null, $value = null, $putMode = false) {
        $option = new OptionHelper;

        if(is_null($key)) return $option;

        if(!is_null($value) && $putMode) {
            $option->put($key, $value);
        }

        return $option->get($key) ?? $value;
    }
}
