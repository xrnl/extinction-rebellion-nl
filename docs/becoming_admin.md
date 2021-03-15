1. After running `docker-compose up -d`, run `docker ps` to get the list of active containers:

```
CONTAINER ID        IMAGE                         COMMAND                  CREATED             STATUS              PORTS                     NAMES
819d0a538d28        extinction-rebellion-nl_php   "docker-php-entrypoi…"   4 days ago          Up About an hour    0.0.0.0:8000->80/tcp      extinction-rebellion-nl_php_1
cd77a4d5f7c7        mariadb                       "docker-entrypoint.s…"   4 days ago          Up About an hour    0.0.0.0:32770->3306/tcp   extinction-rebellion-nl_db_1
``` 

2. Get shell access inside the docker container running the database with `docker exec -it <db_container_id> bash`. In this example the `<db_container_id` is `cd77a4d5f7c7`. 

3. Use the `mysql` command to connect to the database server. Run the command with the following credentials: `mysql -uadmin -ppass`. 

4. In the database console, execute `use xrnl;` to connect to the website database

5. Make yourself administrator with the following SQL command, where `<email_address>` is the email address that you use for logging into the website:

```
UPDATE wp_usermeta um
    LEFT JOIN wp_users u
    ON um.user_id = u.id 
    SET um.meta_value = 'a:1:{s:13:"administrator";b:1;}'
    WHERE um.meta_key = 'wp_capabilities'
    AND u.user_email = '<email_address>';
```
