### The singleton pattern in PHP
When designing web applications, it often makes sense conceptually and architecturally to allow access to one and only one instance of a particular class. The singleton pattern enables us to do this.

#####Some key notes for  singleton pattern:
>A private constructor `__constructor()` is used to prevent the direct creation of objects from the class.

>The expensive process is performed within the private constructor.

>The magic method `__clone()` is declared as `private` to prevent cloning of an instance of the class via the clone operator.

>The magic method `__wakeup()` is declared as `private` to prevent unserializing of an instance of the class via the global function `unserialize()`.

>The only way to create an instance from the class is by using a static method that creates the object only if it wasn't already created.

>A new instance is created via late static binding in the static creation method `getInstance()` with the keyword `static`. This allows the subclassing of the `class Singleton` in the example.

### Reference
* **PHP the rigt way** ([phptherightway.com](https://phptherightway.com/pages/Design-Patterns.html#singleton))