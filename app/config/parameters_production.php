<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.18
 * Time: 11.33
 */

    $db = parse_url(getenv('CLEARDB_DATABASE_URL'));

    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', $db['us-cdbr-iron-east-05.cleardb.net']);
    $container->setParameter('database_port', $db['~']);
    $container->setParameter('database_name', substr($db["heroku_4f68cbddd5e5c08"], 1));
    $container->setParameter('database_user', $db['be287c64123e38']);
    $container->setParameter('database_password', $db['d272cae9']);
    $container->setParameter('secret', getenv('066c1366ee07f06d37e758236fcb4a3b688fd0df'));
    $container->setParameter('locale', 'en');
    $container->setParameter('mailer_transport', null);
    $container->setParameter('mailer_host', null);
    $container->setParameter('mailer_user', null);
    $container->setParameter('mailer_password', null);
    //belekas