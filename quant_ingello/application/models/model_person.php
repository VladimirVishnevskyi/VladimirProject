<?php
/**
 * Created by PhpStorm.
 * User: olijen
 * Date: 14.02.2020
 * Time: 15:27
 */

class Model_person extends Model {
    public $id = [
        'value' => null,
        'manualInput' => false
    ];
    public $user = [
        'value' => null,
        'validation' => [
            'type' => 'string',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $password = [
        'value' => null,
        'validation' => [
            'type' => 'string',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $email = [
        'value' => null,
        'validation' => [
            'type' => 'string',
            'maxLength' => 255
        ],
        'form' => 'input',
        'manualInput' => true
    ];
    public $token = [
        'value' => null,
        'manualInput' => false
    ];


}