<?php
namespace App\Core;

use ReflectionClass;
use Closure;

class Container
{
    private array $registry = [];
    public function set(string $name, Closure $value)
    {
        $this->registry[$name] = $value;
    }

    public function get(string $classname) : object
    {
        $class = new ReflectionClass($classname);
        $constructor = $class->getConstructor();

        if (isset($this->registry[$classname])) {
            return $this->registry[$classname]($this);
        }

        if ($constructor === null) 
        {
            return new $classname();
        }

        $dependecies = [];
         
        foreach ($constructor->getParameters() as $parameter)
        {
            $type = $parameter->getType();
            $dependecies[] = $this->get($type->getName());
        }
        return new $classname(... $dependecies);

    }
}