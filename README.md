## Подключение в F3

Метод `$f3->mdb('collection')` возвращает обёртку `CollectionEvents` с дополнительной логикой:

- автоматическое исключение soft-deleted (`deleted_at`)
- события insert/update
- auto timestamps (`created_at`, `updated_at`)

Метод `$f3->_mdb('collection')` — это прямой доступ к `\MongoDB\Collection` без каких-либо обработчиков или фильтрации. Используйте его для низкоуровневых операций или административных целей.

# f3-mongo

Расширение для Fat-Free Framework (F3), добавляющее удобный интерфейс работы с MongoDB.

## Возможности

- Упрощённый доступ к коллекциям через `$f3->mdb('collection')`
- Автоматическая фильтрация удалённых записей (`deleted_at`)
- Поддержка агрегаций, обновлений, вставок, удаления и слушателей изменений
- Обёртка `CollectionEvents` с логикой `updated_at`, `created_at`, `bulkWrite`, `insertAsync` и пр.
- Простой API: `find()`, `findOne()`, `insertOne()`, `updateMany()` и др.

## Установка

```bash
composer require apptor/f3-mongo
```

## Использование

```php
use Lumus\mDB;

/** @var \Base&\F3Mongo\MongoAwareF3 $f3 */

\F3Mongo\MongoPlugin::register([
    'host' => 'localhost',
    'port' => 27017,
    'username' => '',
    'password' => '',
    'database' => 'your_db',
]);

$users = $f3->mdb('users')->find(['active' => true]);
```

## Подключение в F3

```php
$f3->set('mdb', fn(string $collection) => mDB::collection($collection));
$f3->set('_mdb', fn(string $collection) => mDB::_collection($collection));
```

## Подсказки в IDE

Добавьте аннотацию:

```php
/** @var \Base&\F3Mongo\MongoAwareF3 $f3 */
```

## Поддержка

Если вы нашли баг или хотите предложить улучшение — создайте issue или pull request.
