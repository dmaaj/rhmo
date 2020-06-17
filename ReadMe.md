## RHMO is made vanilla php

to serve run ```php -S localhost:8000```

## Question 1
### Reserve Account
- url `POST` ```localhost:8000/account/reserve```
- params

> `{ accountName:name
>
>     customerEmail:test@rhmo.com
>
>     customerName:test
>
>     customerAccountNumber:0000000
>
>     customerBankCode:test
>
>     customerAccountNames:test
>
>    `}

### Deactivate Account
- url `POST` ```localhost:8000/account/deactivate```
- params ```{ accountNumber:33232832}```

### Transaction Status
- url `POST` ```localhost:8000/transaction/status```
- params ```{ reference:33232832}```



## Question 2's solution is in the file QuestionTwo.php
``` Looking at the code, there are a few problems with it. But I believe the problem can be solved with raw sql query, instead of a foreach loop```
