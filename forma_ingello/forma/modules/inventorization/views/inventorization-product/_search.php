<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model forma\modules\inventorization\records\InventorizationProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventorization-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        \forma\modules\product\records\Product::getList(),
        ['prompt' => '']
    )->label('Товар') ?>

    <?= $form->field($model, 'inventorization_id')->dropDownList(
        \forma\modules\inventorization\records\Inventorization::getList(),
        ['prompt' => '']
    )->label('Инвентаризация') ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
