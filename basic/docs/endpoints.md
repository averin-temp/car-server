# API Documentation

> ⚠️ Некоторые поля и описания помечены как TODO — требуется уточнение.

---

## Общая информация

- Base URL: `http://localhost`
- Формат данных: `application/json`
- Авторизация: Bearer Token (JWT)

---

## Аутентификация

### POST /auth/token

Получение JWT токена.

**Request Body**
```json
{
  "username": "string",
  "password": "string"
}
```

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": {
    "token": "string",
    "expire": 0
  }
}
```

- `expire` — Unix timestamp окончания действия токена (TODO: подтвердить таймзону)

---

**CURL**
```cmd
curl -X POST "http://localhost/auth/token" \
  -H "Content-Type: application/json" \
  -d '{
        "username": "PLACEHOLDER",
        "password": "PLACEHOLDER"
      }'

```

## Достижения

### GET /achievements/list

Возвращает список достижений пользователя.

**Headers**
- Authorization: Bearer `{token}`

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": [
    {
      "id": 0,
      "name": "string",
      "icon": "string"
    }
  ]
}
```

- `icon` — имя файла иконки (TODO: путь и CDN)

---


**CURL**
```cmd
curl -X GET "http://localhost/achievements/list" -H "Authorization: Bearer PLACEHOLDER"
```

## Новости

### GET /news/list

Возвращает список новостей.

**Headers**
- Authorization: Bearer `{token}`

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": [
    {
      "id": 0,
      "name": "string",
      "content": "string"
    }
  ]
}
```

- `content` — текст новости (TODO: поддержка HTML/Markdown)

---

**CURL**
```cmd
curl -X GET "http://localhost/news/list" -H "Authorization: Bearer PLACEHOLDER" 
```

## Локации

### GET /location/list

Возвращает список доступных локаций.

**Headers**
- Authorization: Bearer `{token}`

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": [
    {
      "id": 0,
      "name": "string",
      "image": "string"
    }
  ]
}
```

- `image` — путь к изображению (TODO: абсолютный или относительный URL)

---


**CURL**
```cmd
curl -X GET "http://localhost/location/list" -H "Authorization: Bearer PLACEHOLDER"
```


## Сессии

### POST /session/start

Запуск игровой сессии.

**Headers**
- Authorization: Bearer `{token}`

**Request Body**
```json
{
  "car_id": 0
}
```

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": {
    "session": {
      "session_id": 0,
      "car_id": 0,
      "user_id": 0
    }
  }
}
```

- `session_id` — идентификатор сессии (TODO: срок жизни)

---


**CURL**
```cmd
curl -X POST "http://localhost/session/start" \
  -H "Authorization: Bearer PLACEHOLDER" \
  -H "Content-Type: application/json" \
  -d '{
        "car_id": PLACEHOLDER
      }'

```



### POST /session/stop

Остановка игровой сессии.

**Headers**
- Authorization: Bearer `{token}`

**Request Body**
```json
{
  "session_id": 0
}
```

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": []
}
```

---


**CURL**
```cmd
curl -X POST "http://localhost/session/stop" \
  -H "Authorization: Bearer PLACEHOLDER" \
  -H "Content-Type: application/json" \
  -d '{
        "session_id": PLACEHOLDER
      }'

```


## Машины

### GET /cars/list

Возвращает список машин по локации.

**Headers**
- Authorization: Bearer `{token}`

**Query Params**
- `location` — ID локации

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": [
    {
      "id": 0,
      "image": "string",
      "location_id": 0,
      "state": 0,
      "session_id": null
    }
  ]
}
```

- `state` — состояние машины (TODO: enum значений)
- `session_id` — активная сессия (если есть)

---

**CURL**
```cmd
curl -X GET "http://localhost/cars/list?location=PLACEHOLDER" -H "Authorization: Bearer PLACEHOLDER"
```

## Пользователи

### GET /users/list

Возвращает список пользователей.

**Headers**
- Authorization: Bearer `{token}`

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": [
    {
      "id": 0,
      "username": "string"
    }
  ]
}
```

---

**CURL**
```cmd
curl -X GET "http://localhost/users/list" -H "Authorization: Bearer PLACEHOLDER"
```


### POST /users/register

Регистрация нового пользователя.

**Request Body**
```json
{
  "username": "string",
  "password": "string"
}
```

**Response**
```json
{
  "status": "success",
  "code": 200,
  "data": {
    "user_id": 0
  }
}
```

- TODO: ограничения на пароль
- TODO: проверки уникальности username

---

**CURL**
```cmd
curl -X POST "http://localhost/users/register" \
  -H "Content-Type: application/json" \
  -d '{
        "username": "PLACEHOLDER",
        "password": "PLACEHOLDER"
      }'

```
