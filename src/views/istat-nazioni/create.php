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
 * @var open20\amos\comuni\models\IstatNazioni $model
 */

$this->title = 'Create Istat Nazioni';
$this->params['breadcrumbs'][] = ['label' => 'Istat Nazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="istat-nazioni-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
