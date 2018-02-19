<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use grozzzny\widgets\switch_checkbox\SwitchCheckbox;
use bl\ace\AceWidget;

$module = $this->context->module->id;
?>

<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form']
]); ?>


<?= $form->field($current_model, 'name') ?>

<?= $form->field($current_model, 'code')->widget(AceWidget::className(), [
    'language' => 'html',
    'attributes' => ['style' => 'width: 100%;min-height: 400px;']
]);
?>

<?=SwitchCheckbox::widget([
    'model' => $current_model,
    'attributes' => [
        'status'
    ]
])?>

<?= Html::submitButton(Yii::t('easyii', 'Save'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>