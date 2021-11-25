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
     * @param string $key
     * @param mixed $value
     * @return string $value
     */
    public function put(string $key, $value)
    {
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
