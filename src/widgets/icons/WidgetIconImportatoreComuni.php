<?php

namespace lispa\amos\comuni\widgets\icons;

use lispa\amos\core\widget\WidgetIcon;
use Yii;
use yii\helpers\ArrayHelper;
use lispa\amos\comuni\AmosComuni;

class WidgetIconImportatoreComuni extends WidgetIcon
{

    public function init()
    {
        parent::init();

        $this->setLabel(AmosComuni::t('amoscomuni', 'Importatore Comuni'));
        $this->setDescription(AmosComuni::t('amoscomuni', 'Gestione delle importazioni Comuni'));

        $this->setIcon('linentita');
        $this->setIconFramework('dash');
        $this->setUrl(Yii::$app->urlManager->createUrl(['/comuni/importatore/import-comuni']));
        $this->setModuleName('comuni');
        $this->setNamespace(__CLASS__);

        $this->setClassSpan(ArrayHelper::merge($this->getClassSpan(), [
            'bk-backgroundIcon',
            'color-grey'
        ]));
    }

}
