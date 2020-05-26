<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    Open20Package
 * @category   CategoryName
 */

use open20\amos\core\helpers\Html;

/**
 * @var yii\web\View $this
 * @var open20\amos\comuni\models\IstatContinenti $model
 */

$this->title = 'Create Istat Continenti';
$this->params['breadcrumbs'][] = ['label' => 'Istat Continenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="istat-continenti-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
