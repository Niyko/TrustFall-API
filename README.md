# TrustFall-API-
API files of Trust Fall Android app

# Docs
## Create user
Create a new user from the trustfall app and add it to the database

### Details
| Method | Uri | Authorization |
| --- | --- | --- |
| POST | `/create_user.php` | auth_pass |

### Request
```json
{
    "auth_key": "[AUTH-KEY]",
    "username": "Candace",
    "mobile": "9287548490",
    "password": "mypassword",
    "emergency_contact": "9747187296"
}
```

### Request parameters
| Parameter | type | Details | Example
| --- | --- | --- | --- |
| `auth_key` | String | Auth key given in the `env.php` | ef98y3497th34 |
| `username` | String | Full name of the new user | Canadace |
| `mobile` | String | 10 digit mobile number of the user | 9747187296 |
| `password` | String | Min 8 chars user password | mypassword |
| `emergency_contact` | String | 10 digit emergency contact number, to which the distress signal will be sent | 9747187296 |

### Response
```json
{
    "status": true,
    "code": "user-created",
    "user_id": 3,
    "user_mobile": "9287548490",
    "description": "User is successfully created"
}
```

### Response codes
| Code | Description |
| --- | --- |
| `user-created` | User is successfully created |
| `user-exist` | User with this mobile no. is already registered |
| `error` | Error when inserting the user to the database table |