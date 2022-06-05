<?php
Class Model_comment extends Model
{
    public $id = [
        'value' => null,
        'manualInput' => false
    ];
    public $name = [
        'value' => null,
        'validation' => [
            'type' => 'varchar',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $date = [
        'value' => null,
        'validation' => [
            'type' => 'datetime',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $text = [
        'value' => null,
        'validation' => [
            'type' => 'varchar',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $email = [
        'value' => null,
        'validation' => [
            'type' => 'varchar',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $rating = [
        'value'=>null,
        'validation' => [
            'type' => 'int',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $product_id = [
        'value' => null,
        'validation' => [
            'type' => 'int',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];

}