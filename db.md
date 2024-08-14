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
    -first_name
    -last_name
    -school_of_study
    -department_of_study
    -date_of_birth
    -is_approved

## student_batch

    -student_id
    -batch_id

## admin

    -user_id
    -first_name
    -last_name

## attendance

    -student_id
    -is_present
    -date
