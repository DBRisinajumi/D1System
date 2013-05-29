<?php
$this->breadcrumbs[] = Yii::t('D1SystemModule.crud','Sysc Components');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('sysc-components-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('D1SystemModule.crud', 'Sysc Components'); ?> <small><?php echo Yii::t('D1SystemModule.crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php $this->widget('TbGridView',
    array(
        'id'=>'sysc-components-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'pager' => array(
        'class' => 'TbPager',
        'displayFirstAndLast' => true,
    ),
    'columns'=>array(
		'sysc_id',
		array(
					'name'=>'sysc_syss_id',
					'value'=>'CHtml::value($data,\'syscSyss.syss_ccmp_id\')',
							'filter'=>CHtml::listData(SyssSystem::model()->findAll(), 'syss_id', 'syss_ccmp_id'),
							),
		array(
					'name'=>'sysc_sysc_id',
					'value'=>'CHtml::value($data,\'syscComponents.sysc_syss_id\')',
							'filter'=>CHtml::listData(SyscComponents::model()->findAll(), 'sysc_id', 'sysc_syss_id'),
							),
		'sysc_level',
		'sysc_is_parent',
		'sysc_name',
		array(
					'name'=>'sysc_sysm_id',
					'value'=>'CHtml::value($data,\'syscSysm.sysm_name\')',
							'filter'=>CHtml::listData(SysmSysmaker::model()->findAll(), 'sysm_id', 'sysm_name'),
							),
		/*
		'sysc_deleted',
		*/
        array(
            'class'=>'TbButtonColumn',
            'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('sysc_id' => \$data->sysc_id))",
            'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('sysc_id' => \$data->sysc_id))",
            'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('sysc_id' => \$data->sysc_id))",
        ),
    ),
)); ?>
