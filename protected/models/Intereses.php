<?php

/**
 * This is the model class for table "tblIntereses".
 *
 * The followings are the available columns in table 'tblIntereses':
 * @property integer $intId
 * @property string $intNombre
 *
 * The followings are the available model relations:
 * @property TblUsuariosXTblIntereses[] $tblUsuariosXTblIntereses
 */
class Intereses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblIntereses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('intNombre', 'required'),
			array('intNombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('intId, intNombre', 'safe', 'on'=>'search'),
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
			'UsuariosXIntereses' => array(self::HAS_MANY, 'UsuariosXTblIntereses', 'tblIntereses_intId'),
			// 'usuarios' => array(self::HAS_MANY, 'Usuarios', array('tblUsuarios_usuId'=>'usuId'), 'through'=>'UsuariosXIntereses'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'intId' => 'Int',
			'intNombre' => 'Intereses',
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

		$criteria->compare('intId',$this->intId);
		$criteria->compare('intNombre',$this->intNombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Intereses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
