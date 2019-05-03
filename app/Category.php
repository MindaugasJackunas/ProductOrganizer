<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 */
class Category extends Model
{
    public const COLUMNS = ['id', 'name'];

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function getNameAttribute(string $name)
    {
        return $name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->attributes['name'] = $name;

        return $this;
    }
}
