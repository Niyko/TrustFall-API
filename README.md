![Trust_Fall_API logo](https://i.imgur.com/jYG1zvS.png)
API files of Trust Fall Android app. This API is build up on PHP for backend and MySQL for database. API uses an external php library for MySQLi database wrap, checkout the library https://github.com/ThingEngineer/PHP-MySQLi-Database-Class

## :notebook_with_decorative_cover: Docs
### Create user
Create a new user from the trustfall app and add it to the database

#### Details
| Method | Uri | Authorization |
| --- | --- | --- |
| POST | `/create_user.php` | `auth_pass` |

#### Request
```json
{
    "auth_key": "[AUTH-KEY]",
    "username": "Candace",
    "mobile": "9287548490",
    "password": "mypassword",
    "emergency_contact": "9747187296"
}
```

#### Request parameters
| Parameter | type | Details | Example
| --- | --- | --- | --- |
| `auth_key` | String | Auth key given in the `env.php` | ef98y3497th34 |
| `username` | String | Full name of the new user | Canadace |
| `mobile` | String | 10 digit mobile number of the user | 9747187296 |
| `password` | String | Min 8 chars user password | mypassword |
| `emergency_contact` | String | 10 digit emergency contact number, to which the distress signal will be sent | 9747187296 |

#### Response
```json
{
    "status": true,
    "code": "user-created",
    "user_id": 3,
    "user_mobile": "9287548490",
    "description": "User is successfully created"
}
```

#### Response codes
| Code | Description |
| --- | --- |
| `user-created` | User is successfully created |
| `user-exist` | User with this mobile no. is already registered |
| `error` | Error when inserting the user to the database table |

### User details
Get all details and reports of the already existing user from the database

#### Details
| Method | Uri | Authorization |
| --- | --- | --- |
| GET | `/user_details.php` | `password` |

#### Request
```json
{
    "auth_key": "[AUTH-KEY]",
    "mobile": "9287548490",
    "password": "mypassword",
}
```

#### Request parameters
| Parameter | type | Details | Example
| --- | --- | --- | --- |
| `auth_key` | String | Auth key given in the `env.php` | ef98y3497th34 |
| `mobile` | String | 10 digit mobile number of the user | 9747187296 |
| `password` | String | Raw password of the user | mypassword |

#### Response
```json
{
    "status": true,
    "code": "user-found",
    "user_details": {
        "id": 1,
        "mobile": "9747187296",
        "username": "Candace",
        "password": "mypassword",
        "emergency_contact": "9747187263",
        "current_status": 0
    }
}
```

#### Response codes
| Code | Description |
| --- | --- |
| `user-found` | User data is sucessfully fetched |
| `user-pass-incorrect` | User is found, but the password doesn't match |
| `user-non-exist` | User with this mobile no doesn't exist in the database |

### Send beacon
This API route handles the distress call sending functions, Distress call is sent as direct automated TTS phone call and SMS to the emergency contact numbers

#### Details
| Method | Uri | Authorization |
| --- | --- | --- |
| GET | `/send_beacon.php` | `password` |

#### Request
```json
{
    "auth_key": "[AUTH-KEY]",
    "mobile": "9287548490",
    "password": "mypassword",
}
```

#### Request parameters
| Parameter | type | Details | Example
| --- | --- | --- | --- |
| `auth_key` | String | Auth key given in the `env.php` | ef98y3497th34 |
| `mobile` | String | 10 digit mobile number of the user | 9747187296 |
| `password` | String | Raw password of the user | mypassword |

#### Response
```json
{
    "status": true,
    "code": "becon-sent"
}
```

## :page_with_curl: License
Trust Fall API is licensed under the [MIT License](https://github.com/Niyko/TrustFall-API/blob/master/LICENSE).
