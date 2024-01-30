<?php

use samojanezic\phpmvc\Application;
class m0003_add_posts_table
{
  public function up()
  {
    $db = Application::$app->db;
    $SQL = "CREATE TABLE posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content LONGTEXT NOT NULL,
        image VARCHAR(255) NOT NULL,
        user_id INT NOT NULL,
        url_name VARCHAR(255) NOT NULL,
        created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      ) ENGINE=INNODB;";
    $db->pdo->exec($SQL);
  }

  public function down()
  {
    $db = Application::$app->db;
    $SQL = "DROP TABLE posts;";
    $db->pdo->exec($SQL);
  }
}