<?php
namespace app\models;

use yii\base\Model;

class UserForm extends Model
{
	public $url;

	public function rules()
	{
		return [['url','required'],
				['url','url']];
	}
}