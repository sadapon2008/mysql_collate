# MysqlCollate

Mysql datasource for CakePHP 2.x supporting COLLATE in conditions.

## Example

### 1. change datasource in database.php

```php
public $default = array(
    'datasource' => 'MysqlCollate.Database/MysqlCollate',
    'persistent' => false,
    'host' => 'localhost',
    'port' => '',
    'login' => 'cakeBlog',
    'password' => 'c4k3-rUl3Z',
    'database' => 'cake_blog_tutorial',
    'schema' => '',
    'prefix' => '',
    'encoding' => 'utf8'
);
```

### 2. load MysqlCollateBehavior before Model::find()

```php
$options = array(
    'condition' = array(
        'Post.title LIKE' => 'aBcD',
    ),
    'order' => array(
        'Post.id' => 'ASC',
    ),
);

$this->Post->Behaviors->load(
    'MysqlCollate.MysqlCollate',
    array(
      'Post.title' => 'utf8_unicode_ci',
    )
);

$result = $this->Post->find('all', $options);

$this->Post->Behaviors->unload('MysqlCollate');
```
