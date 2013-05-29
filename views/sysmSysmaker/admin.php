<?php
$this->breadcrumbs[] = Yii::t('D1SystemModule.crud','Sysm Sysmakers');


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('sysm-sysmaker-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('D1SystemModule.crud', 'Sysm Sysmakers'); ?> <small><?php echo Yii::t('D1SystemModule.crud', 'Manage'); ?></small>
</h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php $this->widget('TbGridView',
    array(
        'id'=>'sysm-sysmaker-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'pager' => array(
        'class' => 'TbPager',
        'displayFirstAndLast' => true,
    ),
    'columns'=>array(
		'sysm_id',
		'sysm_name',
        array(
            'class'=>'TbButtonColumn',
            'viewButtonUrl' => "Yii::app()->controller->createUrl('view', array('sysm_id' => \$data->sysm_id))",
            'updateButtonUrl' => "Yii::app()->controller->createUrl('update', array('sysm_id' => \$data->sysm_id))",
            'deleteButtonUrl' => "Yii::app()->controller->createUrl('delete', array('sysm_id' => \$data->sysm_id))",
        ),
    ),
)); ?>
