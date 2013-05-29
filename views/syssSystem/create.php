<?php
$this->breadcrumbs[Yii::t('D1SystemModule.crud','Syss Systems')] = array('admin');
$this->breadcrumbs[] = Yii::t('D1SystemModule.crud', 'Create');
?>
<?php $this->widget("TbBreadcrumbs", array("links"=>$this->breadcrumbs)) ?>
<h1>
    <?php echo Yii::t('D1SystemModule.crud','Syss System')?> <small><?php echo Yii::t('D1SystemModule.crud','Create')?></h1>

<?php $this->renderPartial("_toolbar", array("model"=>$model)); ?>
<?php
$this->renderPartial('_form', array(
'model' => $model,
'buttons' => 'create'));

?>

