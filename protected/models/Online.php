<?php

/**
 * This is the model class for table "online".
 *
 * The followings are the available columns in table 'online':
 * @property integer $id
 * @property string $fechaultimo
 * @property string $hsultimo
 * @property integer $dni_per_usu
 * @property string $name_usu
 * @property string $pass_usu
 *
 * The followings are the available model relations:
 * @property Usuario $dniPerUsu
 * @property Usuario $nameUsu
 * @property Usuario $passUsu
 */
class Online extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'online';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaultimo, hsultimo, dni_per_usu, name_usu, pass_usu', 'required'),
			array('dni_per_usu', 'numerical', 'integerOnly'=>true),
			array('name_usu, pass_usu', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fechaultimo, hsultimo, dni_per_usu, name_usu, pass_usu', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'dniPerUsu' => array(self::BELONGS_TO, 'Usuario', 'dni_per_usu'),
			'nameUsu' => array(self::BELONGS_TO, 'Usuario', 'name_usu'),
			'passUsu' => array(self::BELONGS_TO, 'Usuario', 'pass_usu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fechaultimo' => 'Fechaultimo',
			'hsultimo' => 'Hsultimo',
			'dni_per_usu' => 'Dni Per Usu',
			'name_usu' => 'Name Usu',
			'pass_usu' => 'Pass Usu',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fechaultimo',$this->fechaultimo,true);
		$criteria->compare('hsultimo',$this->hsultimo,true);
		$criteria->compare('dni_per_usu',$this->dni_per_usu);
		$criteria->compare('name_usu',$this->name_usu,true);
		$criteria->compare('pass_usu',$this->pass_usu,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Online the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
