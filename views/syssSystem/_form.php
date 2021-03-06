<div class="">
    <p class="alert">
        <?php echo Yii::t('D1SystemModule.crud','Fields with <span class="required">*</span> are required.');?>
    </p>


    <?php
    $this->widget('echosen.EChosen',
        array('target'=>'select')
    );
    ?>
    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'syss-system-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);

    ?>
 <div class="row">
     <div class="span8"> <!-- main inputs -->

    
    <div class="row-fluid input-block-level-container">
        <div class="span12">
            <?php echo $form->labelEx($model,'name'); ?>

            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'name'); ?>
            <?php if('help.name' != $help = Yii::t('D1SystemModule.crud', 'help.name')) {
                echo "<span class='help-block'>{$help}</span>";            
} ?>
        </div>
    </div>

    <div class="row-fluid input-block-level-container">
        <div class="span12">
        <label for="syssCcmp"><?php echo Yii::t('D1SystemModule.crud', 'SyssCcmp'); ?></label>
                <?php
                $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'syssCcmp',
							'fields' => 'ccmp_name',
							'allowEmpty' => true,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => 'all'),
							)
						)
              ?>
        </div>
    </div>

    </div> <!-- main inputs -->


    <div class="span4"> <!-- sub inputs -->

    </div> <!-- sub inputs -->
</div>


    <div class="form-actions">
        
    <?php
        echo CHtml::Button(Yii::t('D1SystemModule.crud', 'Cancel'), array(
			'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('sysssystem/admin'),
			'class' => 'btn'
			));
        echo ' '.CHtml::submitButton(Yii::t('D1SystemModule.crud', 'Save'), array(
            'class' => 'btn btn-primary'
            ));
    ?>
</div>

<?php $this->endWidget() ?>
</div> <!-- form -->