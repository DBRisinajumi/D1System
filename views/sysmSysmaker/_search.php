<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

                    <div class="row">
            <?php echo $form->label($model,'sysm_id'); ?>
                            <?php echo $form->textField($model,'sysm_id'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'sysm_name'); ?>
                            <?php echo $form->textField($model,'sysm_name',array('size'=>60,'maxlength'=>200)); ?>
                    </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('D1SystemModule.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
