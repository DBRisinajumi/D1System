<div class="wide form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

                    <div class="row">
            <?php echo $form->label($model,'sysc_id'); ?>
                            <?php echo $form->textField($model,'sysc_id',array('size'=>10,'maxlength'=>10)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'sysc_syss_id'); ?>
                            <?php echo $form->dropDownList($model,'sysc_syss_id',CHtml::listData(SyssSystem::model()->findAll(), 'syss_id', 'syss_ccmp_id'),array('prompt'=>'all')); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'sysc_sysc_id'); ?>
                            <?php echo $form->dropDownList($model,'sysc_sysc_id',CHtml::listData(SyscComponents::model()->findAll(), 'sysc_id', 'sysc_syss_id'),array('prompt'=>'all')); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'sysc_level'); ?>
                            <?php echo $form->textField($model,'sysc_level'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'sysc_is_parent'); ?>
                            <?php echo $form->textField($model,'sysc_is_parent'); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'sysc_name'); ?>
                            <?php echo $form->textField($model,'sysc_name',array('size'=>60,'maxlength'=>200)); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'sysc_sysm_id'); ?>
                            <?php echo $form->dropDownList($model,'sysc_sysm_id',CHtml::listData(SysmSysmaker::model()->findAll(), 'sysm_id', 'sysm_name'),array('prompt'=>'all')); ?>
                    </div>

                    <div class="row">
            <?php echo $form->label($model,'sysc_deleted'); ?>
                            <?php echo $form->textField($model,'sysc_deleted'); ?>
                    </div>

        <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('D1System.crud', 'Search')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
