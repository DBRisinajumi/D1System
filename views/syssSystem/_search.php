<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

                    <div class="row">
            <?php echo $form->label($model,'syss_id'); ?>
                            <?php echo $form->textField($model,'syss_id'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'syss_ccmp_id'); ?>
                            <?php echo $form->dropDownList($model,'syss_ccmp_id',CHtml::listData(CcmpCompany::model()->findAll(), 'ccmp_id', 'ccmp_name'),array('prompt'=>'all')); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'name'); ?>
                            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
                    </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('D1SystemModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
