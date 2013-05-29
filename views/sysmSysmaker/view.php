<?php
$this->breadcrumbs[Yii::t('D1SystemModule.crud','Sysm Sysmakers')] = array('admin');
$this->breadcrumbs[] = $model->sysm_id;
?>
<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('D1SystemModule.crud','Sysm Sysmaker')?> <small><?php echo Yii::t('D1SystemModule.crud','View')?> #<?php echo $model->sysm_id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<h2>
    <?php echo Yii::t('D1SystemModule.crud','Data')?></h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
            'sysm_id',
        'sysm_name',
),
        )); ?></p>


<h2>
    <?php echo Yii::t('D1SystemModule.crud','Relations')?></h2>

<div class='well'>
    <div class='row'>
<div class='span3'><?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'syscComponents', 'icon'=>'icon-list-alt', 'url'=> array('syscComponents/admin')),
                array('icon'=>'icon-plus', 'url'=>array('syscComponents/create', 'SyscComponents' => array('sysc_sysm_id'=>$model->{$model->tableSchema->primaryKey}))),
        ),
    )); ?></div><div class='span8'>
<?php
    echo '<span class=label>CHasManyRelation</span>';
    if (is_array($model->syscComponents)) {

        echo CHtml::openTag('ul');
            foreach($model->syscComponents as $relatedModel) {

                echo '<li>';
                echo CHtml::link($relatedModel->sysc_level, array('syscComponents/view','sysc_id'=>$relatedModel->sysc_id), array('class'=>''));

                echo '</li>';
            }
        echo CHtml::closeTag('ul');
    }
?></div>
     </div> <!-- row -->
</div> <!-- well -->
