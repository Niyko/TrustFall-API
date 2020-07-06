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
`````
{
    "status": true,
    "code": "user-created",
    "user_id": 3,
    "user_mobile": "9287548497",
    "description": "User is successfully created"
}
`````
