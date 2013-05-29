<div class="">
    <p class="alert">
        <?php echo Yii::t('D1System.crud','Fields with <span class="required">*</span> are required.');?> 
    </p>


    <?php
    $this->widget('echosen.EChosen',
        array('target'=>'select')
    );
    ?>
    <?php
    $form=$this->beginWidget('CActiveForm', array(
    'id'=>'sysc-components-form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    ));

    echo $form->errorSummary($model);

    ?>
 <div class="row">
     <div class="span8"> <!-- main inputs -->

    
    <div class="row-fluid input-block-level-container">
        <div class="span12">
            <?php echo $form->labelEx($model,'sysc_level'); ?>

            <?php echo $form->textField($model,'sysc_level'); ?>
            <?php echo $form->error($model,'sysc_level'); ?>
            <?php if('help.sysc_level' != $help = Yii::t('D1System.crud', 'help.sysc_level')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
        </div>
    </div>


    <div class="row-fluid input-block-level-container">
        <div class="span12">
            <?php echo $form->labelEx($model,'sysc_is_parent'); ?>
            <?php echo $form->textField($model,'sysc_is_parent'); ?>
            <?php echo $form->error($model,'sysc_is_parent'); ?>
            <?php if('help.sysc_is_parent' != $help = Yii::t('D1System.crud', 'help.sysc_is_parent')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
        </div>
    </div>


    <div class="row-fluid input-block-level-container">
        <div class="span12">
            <?php echo $form->labelEx($model,'sysc_name'); ?>
            <?php echo $form->textField($model,'sysc_name',array('size'=>60,'maxlength'=>200)); ?>
            <?php echo $form->error($model,'sysc_name'); ?>
            <?php if('help.sysc_name' != $help = Yii::t('D1System.crud', 'help.sysc_name')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
        </div>
    </div>


    <div class="row-fluid input-block-level-container">
        <div class="span12">
            <?php echo $form->labelEx($model,'sysc_deleted'); ?>
            <?php echo $form->textField($model,'sysc_deleted'); ?>
            <?php echo $form->error($model,'sysc_deleted'); ?>
            <?php if('help.sysc_deleted' != $help = Yii::t('D1System.crud', 'help.sysc_deleted')) { 
                echo "<span class='help-block'>{$help}</span>";            
} ?>
        </div>
    </div>

    <div class="row-fluid input-block-level-container">
        <div class="span12">
        <label for="syscSysm"><?php echo Yii::t('D1System.crud', 'SyscSysm'); ?></label>
                <?php
                $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'syscSysm',
							'fields' => 'sysm_name',
							'allowEmpty' => false,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => 'all'),
							)
						)
              ?>
        </div>
    </div>

    <div class="row-fluid input-block-level-container">
        <div class="span12">
        <label for="syscSyss"><?php echo Yii::t('D1System.crud', 'SyscSyss'); ?></label>
                <?php
                $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'syscSyss',
							'fields' => 'syss_ccmp_id',
							'allowEmpty' => true,
							'style' => 'dropdownlist',
							'htmlOptions' => array(
								'checkAll' => 'all'),
							)
						)
              ?>
        </div>
    </div>

    <div class="row-fluid input-block-level-container">
        <div class="span12">
        <label for="syscSysc"><?php echo Yii::t('D1System.crud', 'SyscSysc'); ?></label>
                <?php
                $this->widget(
					'Relation',
					array(
							'model' => $model,
							'relation' => 'syscSysc',
							'fields' => 'sysc_level',
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
        echo CHtml::Button(Yii::t('D1System.crud', 'Cancel'), array(
			'submit' => (isset($_GET['returnUrl']))?$_GET['returnUrl']:array('sysccomponents/admin'),
			'class' => 'btn'
			));
        echo ' '.CHtml::submitButton(Yii::t('D1System.crud', 'Save'), array(
            'class' => 'btn btn-primary'
            ));
    ?>
</div>

<?php $this->endWidget() ?>
</div> <!-- form -->