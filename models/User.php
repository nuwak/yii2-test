<?php
//./yii gii/model --tableName=user --modelClass=User

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use \yii\db\Expression;


/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property integer $create_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;

    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'filter', 'filter' => 'trim'],
            [['username', 'email', 'status'], 'required'],
            ['email','email'],
            [['create_at', 'updated_at'], 'safe'],
            [['create_at', 'updated_at'], 'integer'],
            ['username', 'string','min' => 2, 'max' => '255'],
//            ['password','requires', 'on' => 'create'],
            ['username', 'unique','message' =>'Это имя занято.'],
            ['email', 'unique','message' =>'Эта почта уже занята.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'create_at' => 'Create At',
            'updated_at' => 'Updated At',
        ];
    }

    /*Поведения*/
//itodo: Включить это поведение
//    public function behaviors()
//    {
////        return [
////            TimestampBehavior::className()
////        ];
//
//        return [
//            'timestamp' => [
//                'class' => TimestampBehavior::className(),
//                //ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
//                //ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
//                'value' => new Expression('NOW()'),
//
//            ],
//        ];
//
////        return [
////            'timestamp' => [
////                'class' => TimestampBehavior::className(),
////                'attributes' => [
////                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
////                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
////                ],
////                'value' => new Expression('NOW()')
////                'value' => function($event) {
////                    $format = "d/m/Y"; // any format you wish
////                    return date($format);
////                }
////            ],
////        ];
//    }

//    public function behaviors()
//    {
//        return [
//            'timestamp' => [
//                'class' => TimestampBehavior::className(),
//            ],
//        ];
//    }

    /*Поиск*/

    public static function findByUsername($username)
    {
        return static::findOne([
            'username' => $username
        ]);
    }

    /*Хелперы*/

    public function setPassword($password){
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password,$this->password_hash);
    }

    /*itodo: Аутенфикация пользователей */

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord):
                $this->create_at = time();
                $this->updated_at = time();
            else:
                $this->updated_at = time();
            endif;

            return true;
        }
        return false;
    }
}
