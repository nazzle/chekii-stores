<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=chekii_stores',
    'username' => 'postgres',
    'password' => '+255codeNazzle',
    'charset' => 'utf8',
    'schemaMap' => [
          'pgsql' => [
            'class' => 'yii\db\pgsql\Schema',
            'defaultSchema' => 'public' //specify your schema here, public is the default schema
          ]
      ], // PostgreSQL

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
