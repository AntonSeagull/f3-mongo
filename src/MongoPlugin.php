<?php

namespace F3Mongo;

use F3Mongo\CollectionEvents;
use MongoDB\Collection;

use Base;

class MongoPlugin
{

    /**
     * Register MongoDB plugin for Fat-Free Framework.
     *
     * @param array{
     *     host?: string,
     *     port?: int,
     *     username?: string,
     *     password?: string,
     *     database: string,
     *     authSource?: string,
     *     poolSize?: int,
     *     ssl?: bool
     * } $config MongoDB connection configuration
     * 
     * Example:
     * [
     *     'host' => 'localhost',
     *     'port' => 27017,
     *     'username' => 'admin',
     *     'password' => 'secret',
     *     'database' => 'app_db',
     *     'authSource' => 'admin',
     *     'ssl' => false
     * ]
     */
    public static function register(array $config = []): void
    {
        $f3 = Base::instance();

        mDB::setConfig($config);

        $f3->set('mdb', mDB::class);
    }
}


/**
 * @property \F3Mongo\mDB $mdb
 */
interface MongoAwareF3 {}