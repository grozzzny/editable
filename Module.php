<?php
namespace grozzzny\editable;

use Yii;
use yii\easyii2\components\FastModule;

class Module extends FastModule
{
    public $settings = [
        'modelEditable' => '\grozzzny\editable\models\Editable',
    ];

    public $title = 'Editable';
    public $icon = 'file';

    public function getTitle()
    {
        // TODO: Implement getTitle() method.
        return Yii::t('app', $this->title);
    }

    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->id;
    }

    public function getIcon()
    {
        // TODO: Implement getIcon() method.
        return $this->icon;
    }
}