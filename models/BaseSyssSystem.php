<?php

/**
 * This is the model base class for the table "syss_system".
 *
 * Columns in table "syss_system" available as properties of the model:
 * @property integer $syss_id
 * @property string $syss_ccmp_id
 * @property string $name
 *
 * Relations of table "syss_system" available as properties of the model:
 * @property SyscComponents[] $syscComponents
 */
abstract class BaseSyssSystem extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'syss_system';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('syss_ccmp_id, name', 'default', 'setOnEmpty' => true, 'value' => null),
			array('syss_ccmp_id', 'length', 'max'=>10),
			array('name', 'length', 'max'=>200),
			array('syss_id, syss_ccmp_id, name', 'safe', 'on'=>'search'),
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
			'syscComponents' => array(self::HAS_MANY, 'SyscComponents', 'sysc_syss_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'syss_id' => Yii::t('D1System.crud', 'Syss'),
			'syss_ccmp_id' => Yii::t('D1System.crud', 'Syss Ccmp'),
			'name' => Yii::t('D1System.crud', 'Name'),
		);
	}


	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('t.syss_id', $this->syss_id);
		$criteria->compare('t.syss_ccmp_id', $this->syss_ccmp_id, true);
		$criteria->compare('t.name', $this->name, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}
