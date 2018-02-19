<?php
namespace grozzzny\editable\widgets;

use grozzzny\editable\models\Editable;
use yii\base\Widget;

class EditableWidget extends Widget
{
    public function run()
    {
        $html = '';

        foreach (Editable::findAll(['status' => Editable::STATUS_ON]) as $editable) $html .= $editable->code . PHP_EOL;

        return $html;
    }
}