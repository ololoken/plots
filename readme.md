init db:
1. run docker 
2. get mysql process id
3. run:
    1. docker exec -i ${mysql-id} mysql -u root -ptest < test-data/create.sql
    2. docker exec -i ${mysql-id} mysql -u root -ptest test < test-data/init.sql

all other option can be found at
- docker-compose.yaml
- cfg/general.inc.php
