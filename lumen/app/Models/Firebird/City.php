<?php

namespace App\Models\Firebird;

class City extends BaseModel
{
    protected $table = 'CIUDADES';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'CIUDAD_ID';
}
