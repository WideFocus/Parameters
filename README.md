# WideFocus Parameters

This package contains an implementation of a parameter bag.

## Installation

Use composer to install the package.

```shell
$ composer require widefocus/parameters
```

## Usage

### Creating a bag

The package includes a factory to create a parameter bag.

```php
<?php
use WideFocus\Parameters\ParameterBagFactory;

$factory = new ParameterBagFactory();
$bag = $factory->createBag(['foo' => 'Foo']);
if ($bag->has('foo')) {
    echo $bag->get('foo');
}
```

### Adding and removing values.

The bag is immutable but has method to get a copy with an added or a removed
value.

```php
<?php

use WideFocus\Parameters\ParameterBagFactory;

$factory = new ParameterBagFactory();
$bag = $factory->createBag()
    ->with('foo', 'Foo')
    ->with('bar', 'Bar');

$withoutFoo = $bag->without('foo');
```

### Settings values on a subject

A parameter setter can be used to set values on a subject. The default setter
looks for setter methods on the subject.

```php
<?php
use WideFocus\Parameters\ParameterBagFactory;
use WideFocus\Parameters\ParameterSetter;

class Subject
{
    private $foo;
    
    public function setFoo(string $foo)
    {
        $this->foo = $foo; 
    }
    
    public function getFoo(): string
    {
        return $this->foo; 
    }
}

$subject = new Subject();

$factory = new ParameterBagFactory();
$bag = $factory->createBag(['foo' => 'Foo']);

$setter  = new ParameterSetter();
$setter->setParameters($subject, $bag);
echo $subject->getFoo(); // Foo
```