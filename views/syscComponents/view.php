<?php
$this->breadcrumbs[Yii::t('D1System.crud','Sysc Components')] = array('admin');
$this->breadcrumbs[] = $model->sysc_id;
?>
<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('D1System.crud','Sysc Components')?> <small><?php echo Yii::t('D1System.crud','View')?> #<?php echo $model->sysc_id ?></small></h1>



<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>

<h2>
    <?php echo Yii::t('D1System.crud','Data')?></h2>

<p>
    <?php
    $this->widget('TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
            'sysc_id',
        array(
            'name'=>'sysc_syss_id',
            'value'=>($model->syscSyss !== null)?'<span class=label>CBelongsToRelation</span><br/>'.CHtml::link($model->syscSyss->syss_ccmp_id, array('syssSystem/view','syss_id'=>$model->syscSyss->syss_id), array('class'=>'btn')):'n/a',
            'type'=>'html',
        ),
        array(
            'name'=>'sysc_sysc_id',
            'value'=>($model->syscSysc !== null)?'<span class=label>CBelongsToRelation</span><br/>'.CHtml::link($model->syscSysc->sysc_level, array('syscComponents/view','sysc_id'=>$model->syscSysc->sysc_id), array('class'=>'btn')):'n/a',
            'type'=>'html',
        ),
        'sysc_level',
        'sysc_is_parent',
        'sysc_name',
        array(
            'name'=>'sysc_sysm_id',
            'value'=>($model->syscSysm !== null)?'<span class=label>CBelongsToRelation</span><br/>'.CHtml::link($model->syscSysm->sysm_name, array('sysmSysmaker/view','sysm_id'=>$model->syscSysm->sysm_id), array('class'=>'btn')):'n/a',
            'type'=>'html',
        ),
        'sysc_deleted',
),
        )); ?></p>


<h2>
    <?php echo Yii::t('D1System.crud','Relations')?></h2>

<div class='well'>
    <div class='row'>
<div class='span3'><?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'syscComponents', 'icon'=>'icon-list-alt', 'url'=> array('syscComponents/admin')),
                array('icon'=>'icon-plus', 'url'=>array('syscComponents/create', 'SyscComponents' => array('sysc_sysc_id'=>$model->{$model->tableSchema->primaryKey}))),
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
