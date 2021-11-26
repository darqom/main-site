<?php

namespace App\Helpers;

use App\Models\Option;

class OptionHelper
{
    /**
     * Return option value from database
     * 
     * @param string $key
     * @param bool $string
     * @return \App\Models\Option|string|null
     */
    public function get(string $key, bool $string = true)
    {
        $option = Option::where('key', $key)->first();

        return ($string) ? ($option->value ?? null) : $option;
    }

    /**
     * Set option value to database
     * 
     * @param string|array $key
     * @param string|array $value
     * @return string $value
     */
    public function put($key, $value = null)
    {
        if(is_array($key) && is_null($value)) {
            return $this->put_batch($key, $value);
        }

        if(is_array($value)) {
            $value = json_encode($value);
        }

        if($option = $this->get($key, false)) {
            $this->update($option, $value);
            $option = $this->get($key, false);
        } else {
            $option = $this->create($key, $value);
        }

        return $option->value;
    }

    /**
     * Delete option item from database
     * 
     * @param string $key
     * @return boolean $status
     */
    public function delete(string $key)
    {
        $option = $this->get($key, false);

        if($option) {
            return $option->delete();
        }

        return false;
    }

    private function put_batch(array $keys)
    {
        array_walk($keys, function($value, $key) {
            if(is_int($key)) return 0;
            $this->put($key, $value);
        });

        return $keys;
    }

    private function create(string $key, $value)
    {
        return Option::create([
            'key' => $key,
            'value' => $value
        ]);
    }

    private function update(Option $option, $value)
    {
        return $option->update([
            'value' => $value
        ]);
    }
}
