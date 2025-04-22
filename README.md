---
config:
  theme: neutral
---
erDiagram
    direction LR
    classDef white fill:#ffffff,stroke:#000000,color:#000000,stroke-width:1px
    users ||--o{ announcements : ""
    users ||--o{ students : ""
    users ||--o{ notifications : ""
    students ||--o{ tuition_fees : ""
    tuition_fees ||--o{ payments : ""
    class users,students,announcements,tuition_fees,payments,notifications white
    users {
        int id PK
        string username
        string password
        string role
        datetime created_at
    }
    students {
        int id PK
        int user_id FK
        string student_id
        string firstname
        string secondaryname
        string middlename
        string lastname
        string ename
        int age
        string nationality
        string contact
        date birthdate
        string email
        string course
        enum yearlevel
        enum marital_status
        string religion
        string f_fname
        string f_mname
        string f_lname
        string f_contact
        string m_fname
        string m_mname
        string m_lname
        string m_contact
    }
    announcements {
        int id PK
        string title
        text content
        enum audience
        datetime created_at
        int posted_by FK
    }
    tuition_fees {
        int fee_id PK
        int student_id FK
        decimal total_amount
        enum payment_option
        enum status
        datetime created_at
    }
    payments {
        int payment_id PK
        int fee_id FK
        int student_id FK
        decimal amount_paid
        enum payment_term
        datetime payment_date
        string reference_no
        string remarks
    }
    notifications {
        int id PK
        int user_id FK
        text message
        datetime created_at
    }
