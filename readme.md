
**Installation**

 - `git clone https://github.com/kalenyukk/user-interests-filter`
 - Load dump from `db_dump.sql`
 - Create a `config.php` file in a project main folder (see `config.example.php`).
 - Set base_url in `config.php`. It's a path between your domain root and site's base folder. See this example
 - Set up your authentication credentials in `App.php` (`root : root` by default)

    ```$credentials = [
                'login' => 'yourLogin',
                'pwd' => 'yourPassword'
                   ];
                   
 - Install dependencies 
	 `composer install`
 - Main SQL Query 
 ``select * from `users` where exists (select * from `user_interests` where `user_interests`.`user_id` = `users`.`id` and `user_interests`.`interest_id` = 4) and exists (select * from `user_interests` where `user_interests`.`user_id` = `users`.`id` and `user_interests`.`interest_id` = 1) and exists (select * from `user_interests` where `user_interests`.`user_id` = `users`.`id` and `user_interests`.`interest_id` = 3);``