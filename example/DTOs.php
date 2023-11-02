<?php

require __DIR__.'/../vendor/autoload.php';

use Reptily\ArrayList\ArrayList;

class UserList extends ArrayList {
    public function __construct(?array $items = null)
    {
        parent::__construct(UserDTO::class, $items);
    }
};

class UserDTO {
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

$userList = new UserList();
$userList->add(new UserDTO(1, 'bob'));
$userList->add(new UserDTO(2, 'job'));

function echoDTOs(UserList $list): void
{
    $list->forEach(function ($item) {
        echo sprintf("id:%d name:%s" . PHP_EOL, $item->id, $item->name);
    });
}
echoDTOs($userList);