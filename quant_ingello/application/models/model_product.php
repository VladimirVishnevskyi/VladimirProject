<?php

/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 2/11/2020
 * Time: 1:53 PM
 */
class Model_Product extends Model
{
    public $id = [
        'value' => null,
        'manualInput' => false
    ];
    public $title = [
        'value' => null,
        'validation' => [
            'type' => 'string',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true,
    ];
    public $price = [
        'value' => null,
        'validation' => [
            'type' => 'numeric',
            'maxLength' => 11
        ],
        'form' => 'input',
        'manualInput' => true,
    ];

    public function map($product_data)
    {
        $this->id['value'] = $product_data['id'];
        $this->title['value'] = $product_data['title'];
        $this->price['value'] = $product_data['price'];
        $this->isset['value'] = $product_data['isset'];
    }

    public function convertStarInttostring($rating)
    {
        if ((int)$rating == 1) {
            return $rating = 'one';
        } elseif ((int)$rating == 2) {
            return $rating = 'two';
        } elseif ((int)$rating == 3) {
            return (string)$rating = 'three';
        } elseif ((int)$rating == 4) {
            return $rating = 'four';
        } elseif ((int)$rating == 5) {
            return $rating = 'five';
        }
    }

    public function calculeteAVG($comments)
    {
        $sum = 0;
        $product_id = [];
        foreach ($comments as $rating) {
            $sum += $rating['rating'];
        }
        if (empty(count($comments))) {
            $avg = 0;
            return $avg = 'zero';
        } else {
            $avg = round($sum / count($comments), 0);
            $convert = $this->convertStarInttostring($avg);
            return $convert;
        }
    }
}




