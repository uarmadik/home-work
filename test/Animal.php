/*
  Чтобы Вас пригласили на собеседование, вместе с резюме отправьте решение тестового задания:

  Написать класс Cat, который наследуется от класcа Animal. Класс Animal имеет метод getName (name можно передать в конструктор). Класс Cat имеет метод meow (возвращает строку «Cat {catname} is sayig meow».

  Пример использования:

  $cat = new Cat ('garfield');

  $cat->getName () === 'garfield' // true;

  $cat->meow () === 'Cat garfield is saying meow' // true;
*/

class Animal
{
    public function getName()
    {
        return $this->name;
    }
}
class Cat extends Animal
{
    protected $name = '';
    public function meow()
    {
        return 'Cat <b>' . $this->name . '</b> is saying meow';
    }
    public function __construct($name)
    {
        $this->name = ucfirst($name);
    }
}

$cat = new Cat("garfield");
echo $cat->getName(); // Garfield
    echo '<br />';
echo $cat->meow(); // Cat Garfield is saying meow
