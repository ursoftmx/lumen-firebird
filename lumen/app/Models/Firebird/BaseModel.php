<?php

namespace App\Models\Firebird;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection = 'firebird';

    public function setRawAttributes(array $attributes, $sync = false)
    {
        foreach ($attributes as $index => $attribute) {
            if (mb_detect_encoding($attribute) == 'UTF-8') {
                $attributes[$index] = utf8_encode(utf8_decode($attribute));
            }
        }
        return parent::setRawAttributes($attributes, $sync);
    }
}