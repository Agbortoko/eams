# Database draft of entities (dbname => eams)

## user

    -email
    -password
    -is_admin

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
    -batch_id
    -is_approved

## admin

    -user_id
    -first_name
    -last_name

## attendance

    -student_id
    -is_present
    -date
