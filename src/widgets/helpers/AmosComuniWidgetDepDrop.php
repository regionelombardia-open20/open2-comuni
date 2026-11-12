<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 * @package   open20\amos\comuni\widgets\helpers
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

namespace open20\amos\comuni\widgets\helpers;

use open20\amos\comuni\AmosComuni;
use open20\amos\comuni\assets\ComuniAsset;
use open20\amos\comuni\widgets\helpers\AmosComuniWidget;
use open20\amos\comuni\models\IstatNazioni;
use open20\amos\comuni\models\IstatProvince;
use open20\amos\comuni\models\IstatComuni;
use open20\amos\comuni\models\IstatComuniCap;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * 
 */
class AmosComuniWidgetDepDrop extends AmosComuniWidget
{
    /**
     * 
     * @var type
     */
    public $model;

    /**
     * 
     * @var type
     */
    protected $amosComuniModule;

    /***
     * 
     */
    protected $queryNazioni;
    
    /**
     * 
     * @var type
     */
    protected $queryProvince;
    
    /**
     * 
     * @var type
     */
    protected $queryComuni;
    
    /**
     * 
     * @var type
     */
    protected $queryCap;

    /**
     * 
     */
    public function init()
    {
        parent::init();

        //registro il file comuni_common_js.js a tutte le varie view
        ComuniAsset::register(\Yii::$app->getView());

        $this->amosComuniModule = Yii::$app->getModule(AmosComuni::getModuleName());
        
        $this->queryNazioni = IstatNazioni::find();
        $this->queryProvince = IstatProvince::find();
        $this->queryComuni = IstatComuni::find();
        $this->queryCap = IstatComuniCap::find();
        
        if (!empty($this->amosComuniModule->selectOnlyTheseNations)) {
            $this->queryNazioni
                ->andWhere(['id' => $this->amosComuniModule->selectOnlyTheseNations]);
        }

        $this->params['dataProviderNazioni'] = ArrayHelper::map(
            $this->queryNazioni->orderBy('nome')
                ->asArray()
                ->all(),
            'id', 'nome'
        );
        
        if ($this->model->nazione_id == 1) {
            $this->model->nazione_id = [
                1, 2, 3, 4, 5, 6, 7, 8, 9, 10,
                11, 12, 13, 14, 15, 16, 17, 18, 19, 20
            ];
        }

        $this->queryProvince
            ->andWhere(['istat_regioni_id' => $this->model->{$this->params['nazioneAttribute']}])
            ->andWhere(['soppressa' => 0]);

        $this->params['dataProviderProvince'] = ArrayHelper::map(
            $this->queryProvince->orderBy('nome')
                ->asArray()
                ->all(),
            'id', 'nome'
        );

        $this->queryComuni
            ->andWhere(['istat_province_id' => $this->model->{$this->params['provinciaAttribute']}])
            ->andWhere(['soppresso' => 0]);

        $this->params['dataProviderComuni'] = ArrayHelper::map(
            $this->queryComuni->orderBy('nome')
                ->asArray()
                ->all(),
            'id', 'nome'
        );

        $this->params['dataProviderCAP'] = ArrayHelper::map(
            $this->queryCap
                ->andWhere(['comune_id' => $this->model->{$this->params['comuneAttribute']}])
                ->orderBy('cap')->asArray()->all(),
            'id', 'cap');
        
    }
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        $html = '';

        if (isset($this->nazioneConfig)) {
            $html .= $this->render('depdrop/nazioni', $this->params);
        }
        
        if (isset($this->provinciaConfig)) {
            $html .= $this->render('depdrop/province', $this->params);
            $html .= $this->render('depdrop/comuni', $this->params);
        } else {
            $html .= $this->render('depdrop/comune_single', $this->params);
        }

        if (isset($this->capConfig)) {
            $html .= $this->render('cap_view', $this->params);
        }

        return $html;
    }

}