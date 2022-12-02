<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Problem[] $problems
 */
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password', 'passwordConfirm', 'agree'], 'required', 'message' => 'Поле обязательно для заполнения'],
            ['fio', 'match', 'pattern' => '/^[А-Яа-я\s\-]{5,}$/u', 'message' => 'Только кириллица, пробелы и дефисы'],
            ['login', 'match', 'pattern' => '/^[a-zA-z\.]{1,}$/u', 'message' => 'Только латиница и точки'],
            ['login', 'unique', 'message' => 'Такой логин уже используется'],
            ['email', 'email', 'message' => 'Некорректный email'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' =>'Необходимо согласие'],
            [['admin'], 'integer'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Пароль',
            'admin' => 'Admin',
            'passwordConfirm' => 'Подтверждение пороля',
            'agree' => 'Даю согласие на обработку данных',
        ];
    }
}