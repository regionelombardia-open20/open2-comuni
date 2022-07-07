<?php
use open20\amos\core\helpers\Html;
use open20\amos\core\forms\ActiveForm;
use kartik\builder\Form;
use open20\amos\core\forms\Tabs;
use open20\amos\core\forms\CloseSaveButtonWidget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


$this->title = Yii::t('cruds', 'Aggiorna COMUNI');
$this->params['breadcrumbs'][] = ['label'=>'comuni', 'url'=>'/comuni'];
$this->params['breadcrumbs'][] = $this->title;
?>



<?php //$form = ActiveForm::begin(); ?>
<?php echo $form = \yii\helpers\Html::beginForm('','post'); ?>
<?php
    /*$this->beginBlock('principale');

    $this->endBlock('principale');
    $itemsTab[] = [
        'label' => '',
        'content' => $this->blocks['principale'],
    ];*/
?>

<?php
/*echo Tabs::widget(
    [
        'encodeLabels' => false,
        'items' => $itemsTab
    ]
);*/
?>

<?php echo Html::input('hidden', 'confirm', true); ?>

<legend>Dati che andrebbero aggiornati: (totale: <?= count($dati['update']);?>)</legend>

<div class="row">
    <div class="col-xs-3"><strong>ID</strong></div>
    <div class="col-xs-3"><strong>Comune Nome</strong></div>
    <div class="col-xs-3"><strong>Provincia</strong></div>
    <div class="col-xs-3"><strong>Regione</strong></div>
</div>


<?php
if( empty($dati['update'])): ?>
    <div class="row"><div class="col-xs-4">Nessun comune da variare in sospeso</div></div>
    <?php
else:

    foreach ( $dati['update'] as $k => $array_data ): ?>
        <div class="row">
            <div class="col-xs-3"><?= $array_data['comuneRecord']->id; ?></div>
            <div class="col-xs-3"><?= $array_data['comuneRecord']->nome; ?></div>
            <div class="col-xs-3"><?= $array_data['comuneRecord']->istatProvince->nome; ?></div>
            <div class="col-xs-3"><?= $array_data['comuneRecord']->istatRegioni->nome; ?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>





<div class="m-t-30">

    <?php
    if( !empty($dati)):
        echo Html::submitButton('Genera', ['name'=> 'submit', 'value'=> true, 'class' => 'btn btn-primary'] );
    endif; ?>
<?php //ActiveForm::end(); ?>
<?php \yii\helpers\Html::endForm(); ?>

</div>


