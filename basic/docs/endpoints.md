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
