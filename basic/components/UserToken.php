<?php
namespace app\components;

use Yii;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use app\models\User;
use yii\base\InvalidArgumentException;

/**
 * Объект для работы с токеном пользователя
 */
class UserToken
{
    private string $jwt;
    private array $payload;
    private string $secret;
    private string $alg;

    /**
     * Создаёт объект из строки токена
     */
    public function __construct(string $jwt, string $secret = null, string $alg = 'HS256')
    {
        $this->jwt = $jwt;
        $this->secret = $secret;
        $this->alg = $alg;
        $this->decode();
    }

    /**
     * Генерация нового токена
     */
    public static function create(int $uid, int $expire = 3600, string $secret = 'default-secret', string $alg = 'HS256'): self
    {
        $payload = [
            'uid' => $uid,
            'exp' => time() + $expire,
        ];
        $jwt = JWT::encode($payload, $secret, $alg); // Provided key is too short
        return new self($jwt, $secret, $alg);
    }

    private function decode(): void
    {
        try {
            $this->payload = (array) JWT::decode($this->jwt, new Key($this->secret, $this->alg));
        } catch (\Exception $e) {
            throw new InvalidArgumentException('Invalid JWT token: ' . $e->getMessage());
        }
    }

    public function isExpired(): bool
    {
        return $this->payload['exp'] < time();
    }

    public function getExpire(): int
    {
        return $this->payload['exp'];
    }

    public function getUid(): int
    {
        return $this->payload['uid'];
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function __toString(): string
    {
        return $this->jwt;
    }
}

