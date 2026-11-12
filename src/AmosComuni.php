<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\comuni
 * @author    Aria S.p.A. <protocollo@pec.ariaspa.it>
 * @license   GNU General Public License v3.0 <https://www.gnu.org/licenses/gpl-3.0.html>
 * @link      https://www.ariaspa.it/
 *
 * This file is part of OPEN 2.0.
 *
 * OPEN 2.0 is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OPEN 2.0 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OPEN 2.0. If not, see <https://www.gnu.org/licenses/>.
 */

namespace open20\amos\comuni;

use open20\amos\core\module\AmosModule;
use open20\amos\comuni\widgets\icons\WidgetIconAmmComuni;
use open20\amos\comuni\widgets\icons\WidgetIconComuni;
use open20\amos\comuni\widgets\icons\WidgetIconProvince;

/**
 * AmosComuni module definition class
 */
class AmosComuni extends AmosModule {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'open20\amos\comuni\controllers';
    
    /**
     * 
     * @var type
     */
    public $newFileMode = 0666;
    
    /**
     * 
     * @var type
     */
    public $newDirMode = 0777;
    
    /**
     * 
     * @var type
     */
    public $name = 'comuni';

    /**
     * 
     */
    public $selectOnlyTheseNations = [];
    
    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();

        // custom initialization code goes here
        \Yii::configure($this, require(__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php'));
    }

    /**
     * 
     * @return type
     */
    protected function getDefaultModels() {
        return [];
    }

    /**
     *
     * @return string
     */
    public static function getModuleName() {
        return 'comuni';
    }

    /**
     * 
     * @return type
     */
    public function getWidgetGraphics() {
        return null;
    }

    /**
     * 
     * @return type
     */
    public function getWidgetIcons() {
        return [
            WidgetIconAmmComuni::class,
            WidgetIconComuni::class,
            WidgetIconProvince::class,
        ];
    }

}
