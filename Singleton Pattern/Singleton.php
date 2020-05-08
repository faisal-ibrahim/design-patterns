<?php

class Singleton
{
    private static $instances = [];

    /**
     * The Singleton's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    protected function __construct()
    {
    }

    /**
     * Singletons should not be cloneable.
     */
    protected function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * Singletons should not be re-storable from strings.
     */
    public function __wakeup()
    {
        throw new Exception('Cannot un-serialize a singleton object.');
    }

    /**
     * This is the static method that controls the access to the singleton
     * instance. On the first run, it creates a singleton object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Singleton class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstances(): Singleton
    {
        $subClass = self::class;
        if (!isset(self::$instances[$subClass])) {
            self::$instances[$subClass] = new static;
        }

        return self::$instances[$subClass];

        // We can replace line no 34 to 38 with the below single line. Its works PHP 7.4
        // return self::$instances[$subClass] ??= new static;
    }

    public function getName()
    {
        echo "My name is Faisal.";
    }

    public static function dump()
    {
        print_r(self::$instances);
    }
}

$object1 = Singleton::getInstances();
$object2 = Singleton::getInstances();

$object1->getName();

Singleton::dump();

if ($object1 === $object2) {
    echo "Singleton works, both variables contain the same instance.";
} else {
    echo "Singleton failed, variables contain different instances.";
}
