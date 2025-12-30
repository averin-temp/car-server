<?php
namespace app\components;

use Yii;
use app\models\User;

/**
 * Сервис аутентификации
 *
 * @property int $jwtExpire
 * @property int $jwtSecret
 * @property int $jwtAlg
 */
class AuthService extends \yii\base\Component
{
    public $jwtExpire = 3600; // 1 час
    public $jwtSecret = 'DJFqw2&*';
    public $jwtAlg = 'HS256';
    public $minPasswordLength = 8;

    private $user;

    /**
     * Создаёт AccessToken (UserToken) для пользователя
     *
     * @param User $user
     * @return UserToken
     */
    public function createAccessToken(User $user): UserToken
    {
        return UserToken::create(
            $user->id,
            $this->jwtExpire,
            $this->jwtSecret,
            $this->jwtAlg
        );
    }

    /**
     * Проверка пароля
     */
    public function validatePassword(string $password, string $password_hash): bool
    {
        return Yii::$app->security->validatePassword($password, $password_hash);
    }

    /**
     * Создать UserToken из существующей строки токена
     */
    public function parseAccessToken(string $token): UserToken
    {
        return new UserToken($token, $this->jwtSecret, $this->jwtAlg);
    }


    /**
     * @param User $user
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


    /**
     * @return User|NULL
     */
    public function getUser()
    {
        return $this->user;
    }
}