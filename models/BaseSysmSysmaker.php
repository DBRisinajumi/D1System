<?php

/**
 * This is the model base class for the table "sysm_sysmaker".
 *
 * Columns in table "sysm_sysmaker" available as properties of the model:
 * @property integer $sysm_id
 * @property string $sysm_name
 *
 * Relations of table "sysm_sysmaker" available as properties of the model:
 * @property SyscComponents[] $syscComponents
 */
abstract class BaseSysmSysmaker extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'sysm_sysmaker';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('sysm_name', 'required'),
			array('sysm_name', 'length', 'max'=>200),
			array('sysm_id, sysm_name', 'safe', 'on'=>'search'),
		    )
		);
	}

	public function behaviors()
	{
		return array_merge(
		    parent::behaviors(), array(
			'savedRelated' => array(
				'class' => 'gii-template-collection.components.CSaveRelationsBehavior'
			)
		    )
		);
	}

	public function relations()
	{
		return array(
			'syscComponents' => array(self::HAS_MANY, 'SyscComponents', 'sysc_sysm_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'sysm_id' => Yii::t('D1System.crud', 'Sysm'),
			'sysm_name' => Yii::t('D1System.crud', 'Sysm Name'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.sysm_id', $this->sysm_id);
		$criteria->compare('t.sysm_name', $this->sysm_name, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
