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

        $f3->set('mdb', fn(string $collection) => mDB::collection($collection));
        $f3->set('_mdb', fn(string $collection) => mDB::_collection($collection));
    }
}


/**
 * @method CollectionEvents mdb(string $collection)
 * @method Collection _mdb(string $collection)
 */
interface MongoAwareF3 {}