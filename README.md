# 9channel-backend

## members

- Soma-Tanabe
- Hashimoto-Yoichi

```zsh
GET /api/login
```

200 成功

```zsh
{
 body: {
    id: number,
    username: string,
    email: string,
 },
}
```

400 失敗

```zsh
{
  body: {
    message: string, // "パスワード間違っています"
  },
}
```

```zsh
POST /rest/v1/aspiration
```

body

```json
{
  "body": {
    "aspiration": [
      {
        "aspiration": "aaa",
        "name": "aaa",
        "isWebAccess": true
      },
      {
        "aspiration": "aaa",
        "name": "aaa",
        "isWebAccess": true
      }
    ]
  }
}
```

200 成功

400 失敗

```json
{
  "body": {
    "message": "失敗しました"
  }
}
```
