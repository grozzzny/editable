<?php
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use grozzzny\widgets\switch_checkbox\SwitchCheckbox;
use bl\ace\AceWidget;
/**
 * @var View $this
 * @var \grozzzny\editable\models\Editable $model
 */

$module = $this->context->module->id;
?>

<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form']
]); ?>


<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'code')->widget(AceWidget::className(), [
    'language' => 'html',
    'attributes' => ['style' => 'width: 100%;min-height: 400px;']
]);
?>

<?=SwitchCheckbox::widget([
    'model' => $model,
    'attributes' => [
        'status'
    ]
])?>

<?= Html::submitButton(Yii::t('easyii2', 'Save'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>