<?php

/**
 * Created by PhpStorm.
 * User: Михаил
 * Date: 2/11/2020
 * Time: 1:53 PM
 */
Class Model_Dove extends Model
{
    public $id = [
        'value' => null,
        'manualInput' => false
    ];
    public $name = [
        'value' => null,
        'validation' => [
            'type' => 'string',
            'maxLength' => 62
        ],
        'form' => 'input',
        'manualInput' => true,
    ];
    public $age = [
        'value' => null,
        'validation' => [
            'type' => 'numeric',
            'maxLength' => 2
        ],
        'form' => 'input',
        'manualInput' => true,
    ];
    public $color = [
        'value' => null,
        'validation' => [
            'type' => 'string',
            'maxLength' => 6
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $sex = [
        'value' => null,
        'validation' => [
            'type' => 'numeric',
            'maxLength' => 1
        ],
        'form' => 'input',
        'manualInput' => true,
    ];
    public $wedding_count = [
        'value' => null,
        'validation' => [
            'type' => 'numeric',
            'maxLength' => 10
        ],
        'form' => 'input',
        'manualInput' => true,
    ];

    public function map($dove_data){
        $this->id['value'] = $dove_data['id'];
        $this->name['value'] = $dove_data['name'];
        $this->age['value'] = $dove_data['age'];
        $this->sex['value'] = $dove_data['sex'];
        $this->color['value'] = $dove_data['color'];
        $this->wedding_count['value'] = $dove_data['wedding_count'];
    }
}




