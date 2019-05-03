<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Product
 */
class Product extends Model
{
    public const COLUMNS = ['id', 'name', 'category' , 'quantity', 'price', 'description'];

    protected $with = ['category'];

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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

    /**
     * @param int $categoryId
     *
     * @return $this
     */
    public function setCategoryId(int $categoryId)
    {
        $this->attributes['category_id'] = $categoryId;

        return $this;
    }

    /**
     * @param int $quantity
     *
     * @return int
     */
    public function getQuantityAttribute(int $quantity)
    {
        return $quantity;
    }

    /**
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity(int $quantity)
    {
        $this->attributes['quantity'] = $quantity;

        return $this;
    }

    /**
     * @param string $price
     *
     * @return string
     */
    public function getPriceAttribute(string $price)
    {
        return number_format($price,2,',','');
    }

    /**
     * @param string $price
     *
     * @return $this
     */
    public function setPrice(string $price)
    {
        $this->attributes['price'] = floor(100 * (float) $price);

        return $this;
    }
}
