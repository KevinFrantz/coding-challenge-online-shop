# coding-challenge-online-shop
Coding challenge for a online shop
## tasks
### requirements
1. Create a web application with PHP which works like a really small online shop.  	&#10003;
2. Create a database with at least 20 products automatically per script.  	&#10003;
3. Create a product listing which display all products from the database. The following information are required:
  - price net and gross  	&#10003;
  - image  	&#10003;
  - product name  	&#10003;
  - color  	&#10003;
4. Add a “to the basket” button to each product in the listing.  	&#10003;
5. Make the product basket work and display all products which are in the basket as a list with
small images.
6. Create a login and registration with e-mail address, password and a name.  	&#10003;
7. The login should be session based.  	&#10003;
8. Create a checkout which is shown when the user is logged in. &#10003;
9. The user should be able to choose between 2 payment methods. Call them method1  	&#10003; and
method2 &#10003;.
10. Store the order at the database. &#10003;
11. Add a color filter to the product list. The user should be able to filter the listing with the existing colors. &#10003;
### specifications
- Please use PHP 	&#10003;, MySQL  	&#10003; and HTML  	&#10003;. You can also use CSS &#10003;, JavaScript, Bootstrap  	&#10003; and jQuery.
- Save your code online at github.  	&#10003;
- Please use an autoloader and namespaces.  	&#10003;
- Don’t use a ready to go framework. Build the application from the scratch.  	&#10003;
- Use transactions if it makes sense.  	&#10003;
- Please cover your code with unit tests.  	&#10003;

## start
To run the program execute:
```bash
  bash ./start.sh
```
### Attention
This is a demo program; Everytime when you start the demo the database will be reset.

## test
To run the tests execute:
```bash
  bash ./test.sh
```
Tests just exist for the core and the entities. UnitTest you will find in the directory of the unit.
