<?php
$this->breadcrumbs[] = Yii::t('D1SystemModule.crud','Syss Systems');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('syss-system-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('D1SystemModule.crud', 'Syss Systems'); ?> <small><?php echo Yii::t('D1SystemModule.crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php $this->widget('TbGridView',
    array(
        'id'=>'syss-system-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'pager' => array(
        'class' => 'TbPager',
        'displayFirstAndLast' => true,
    ),
    'columns'=>array(
		'syss_id',
		array(
					'name'=>'syss_ccmp_id',
					'value'=>'CHtml::value($data,\'syssCcmp.ccmp_name\')',
							'filter'=>CHtml::listData(CcmpCompany::model()->findAll(), 'ccmp_id', 'ccmp_name'),
							),
		'name',
        array(
            'class'=>'TbButtonColumn',
            'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('syss_id' => \$data->syss_id))",
            'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('syss_id' => \$data->syss_id))",
            'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('syss_id' => \$data->syss_id))",
        ),
    ),
)); ?>
