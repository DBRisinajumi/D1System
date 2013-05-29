<?php

/**
 * This is the model base class for the table "sysc_components".
 *
 * Columns in table "sysc_components" available as properties of the model:
 * @property string $sysc_id
 * @property integer $sysc_syss_id
 * @property string $sysc_sysc_id
 * @property integer $sysc_level
 * @property integer $sysc_is_parent
 * @property string $sysc_name
 * @property integer $sysc_sysm_id
 * @property integer $sysc_deleted
 *
 * Relations of table "sysc_components" available as properties of the model:
 * @property SysmSysmaker $syscSysm
 * @property SyssSystem $syscSyss
 * @property SyscComponents $syscSysc
 * @property SyscComponents[] $syscComponents
 */
abstract class BaseSyscComponents extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'sysc_components';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('sysc_name, sysc_sysm_id', 'required'),
			array('sysc_syss_id, sysc_sysc_id, sysc_level, sysc_is_parent, sysc_deleted', 'default', 'setOnEmpty' => true, 'value' => null),
			array('sysc_syss_id, sysc_level, sysc_is_parent, sysc_sysm_id, sysc_deleted', 'numerical', 'integerOnly'=>true),
			array('sysc_sysc_id', 'length', 'max'=>10),
			array('sysc_name', 'length', 'max'=>200),
			array('sysc_id, sysc_syss_id, sysc_sysc_id, sysc_level, sysc_is_parent, sysc_name, sysc_sysm_id, sysc_deleted', 'safe', 'on'=>'search'),
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
			'syscSysm' => array(self::BELONGS_TO, 'SysmSysmaker', 'sysc_sysm_id'),
			'syscSyss' => array(self::BELONGS_TO, 'SyssSystem', 'sysc_syss_id'),
			'syscSysc' => array(self::BELONGS_TO, 'SyscComponents', 'sysc_sysc_id'),
			'syscComponents' => array(self::HAS_MANY, 'SyscComponents', 'sysc_sysc_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'sysc_id' => Yii::t('D1SystemModule.crud', 'Sysc'),
			'sysc_syss_id' => Yii::t('D1SystemModule.crud', 'Sysc Syss'),
			'sysc_sysc_id' => Yii::t('D1SystemModule.crud', 'Sysc Sysc'),
			'sysc_level' => Yii::t('D1SystemModule.crud', 'Sysc Level'),
			'sysc_is_parent' => Yii::t('D1SystemModule.crud', 'Sysc Is Parent'),
			'sysc_name' => Yii::t('D1SystemModule.crud', 'Sysc Name'),
			'sysc_sysm_id' => Yii::t('D1SystemModule.crud', 'Sysc Sysm'),
			'sysc_deleted' => Yii::t('D1SystemModule.crud', 'Sysc Deleted'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.sysc_id', $this->sysc_id, true);
		$criteria->compare('t.sysc_syss_id', $this->sysc_syss_id);
		$criteria->compare('t.sysc_sysc_id', $this->sysc_sysc_id);
		$criteria->compare('t.sysc_level', $this->sysc_level);
		$criteria->compare('t.sysc_is_parent', $this->sysc_is_parent);
		$criteria->compare('t.sysc_name', $this->sysc_name, true);
		$criteria->compare('t.sysc_sysm_id', $this->sysc_sysm_id);
		$criteria->compare('t.sysc_deleted', $this->sysc_deleted);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
