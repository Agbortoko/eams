# Database draft of entities (dbname => eams)

## user

    -email
    -password
    -is_admin
    -email_verified_at
    -password_reset_token

## batch

    -name
    -description

## student

    -user_id
    -batch_id
    -first_name
    -last_name
    -school
    -department
    -date_of_birth
    -is_approved

## admin

    -user_id
    -first_name
    -last_name

## attendance

    -admin_id (The marker)
    -student_id
    -is_present
    -date

## settings

    -name
    -value
