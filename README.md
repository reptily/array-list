# Install
```bash
composer require reptily/array-list
```
## what problem does this library solve?
There are no built-in mechanisms for creating lists in the PHP language. An associative array does not guarantee that its elements are typed.
Example
```php
function show(array $items)
{
    foreach ($items as $item) {
        echo $item->id . PHP_EOL;
    }
}
```
In this example, we do not guarantee that all elements will be the necessary objects, and we also do not guarantee that the array will be without attachments.
```php
function show(ArrayList $items)
{
    foreach ($items as $item) {
        echo $item->id . PHP_EOL;
    }
}
```
The code did not become larger, but typification appeared.
**ArrayList** takes care of all typing and data access issues. We can be sure that all types in the array are correct and not do unnecessary checks.

##Example
More examples in the directory [/example](/example)

#Only integer
```php
$list = new ArrayList(ArrayList::TYPE_INTEGER[1, 2, 3]);
// or
$list = new ArrayListInteger([1, 2, 3]);

foreach ($list as $item) {
    echo $item . PHP_EOL;
}
```

#If we need a collection of objects
```php
class UserList extends ArrayList {};
class UserDTO {
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

$userList = new UserList(UserDTO::class);
$userList->add(new UserDTO(1, 'bob'));
$userList->add(new UserDTO(2, 'job'));

function echoDTOs(UserList $list): void
{
    $list->forEach(function ($item) {
        echo sprintf("id:%d name:%s" . PHP_EOL, $item->id, $item->name);
    });
}
```