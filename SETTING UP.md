<a name="readme-top"></a>

<div align="center">
    <h3 align="center">SETTING UP YOUR TERMINAL MANUAL</h3>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#cloning-repository">Cloning Repository</a>
    </li>
    <li>
      <a href="#database-setup">Database Setup</a>
      <ul>
        <li><a href="#database-seeding">Database Seeding</a></li>
        <li><a href="#importing-sql">Importing SQL</a></li>
      </ul>
    </li>
    <li>
      <a href="#running-server">Running Server</a>
    </li>
    <li>
      <a href="#user-authentication">User Authentication</a>
    </li>
    <li>
      <a href="#testing">Testing</a>
      <ul>
        <li><a href="#run-all-tests">Run All Tests</a></li>
        <li><a href="#run-specific-test-class">Run Tests on Specific Feature Only</a></li>
        <li><a href="#run-specific-test-case">Run Tests on Specific Test Case Only</a></li>
      </ul>
    </li>
  </ol>
</details>

<!-- CLONING THE REPOSITORY -->
## Cloning Repository

To clone the repository, go to the GitHub link below.

Repository Link: https://github.com/leiannezapioquinto/leianneza-pioquinto-coding-test/


<!-- DATABASE SETUP -->
## Database Setup

You have two options to setup your database. The first one is to migrate the schema structure into the SQL Server and run the seeder to fill them with dummy data.
The second one is to just import the SQL file already loaded with data and structure into the SQL server.


### Database Seeding

1. Migrate the table structure in the SQL Server <br>
   Command: <b> php artisan migrate </b> 
2. Run the Seeder Command <br>
   Commmand: <b> php artisan db:seed --class=ProductsTableSeeder </b>  (Products) <br>
   Command: <b> php artisan db:seed --class=DatabaseSeeder </b>  (Users) 

   You can access both files in: <b> /database/seeders </b> <br>
4. You should be able to see "Seeding database" message in the console. 
5. Verify that the data has been added to your database table 


### Importing SQL

You can also just import the SQL file already loaded with data.

1. Go to <b> /database/data </b>
2. In there, the <b> data.sql </b> file is located
3. You can import them into your SQL server.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- RUNNING SERVER -->
## Running Server

1. Configure your .env file
   2. Replace the database credentials accordingly
   3. Make sure to change the database name, username and password
2. Run the start command: <br>
   Command: **php artisan serve**
3. Access the website via: <br>
   <b> 127.0.0.1:8000 </b>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USER AUTHENTICATION -->
## User Authentication

All the passwords are hashed, but their passwords are just the same.

email: <b> <i> Check database </b> </i> <br>
Password: <b> password123 </b>

<!-- TESTING -->
## Testing

This section aims to help you get an understanding on how you can run the automated tests in the system.
<br><br>

All the test cases files are located in <b> /tests/feature </b>
#### Run All Tests:

You can run all the tests simultaneously through command: <br>
<b> php artisan test </b>

You should be able to see a similar output like below:
<br>
<b>
PASS  Tests\Unit\ExampleTest <br>
✓ that true is true
</b>

#### Run Specific Test Class

To run tests for a specific feature only, you can run the following commands:

* User Authentication: <b> php artisan test --filter UserAuthenticationTest </b>
* View Product Details: <b> php artisan test --filter ProductDetailsFetchTest </b>
* Delete a Product: <b> php artisan test --filter ProductDeletionTest </b>
* Edit a Product: <b> php artisan test --filter ProductEditTest </b>

#### Run Specific Test Case

To run specific test cases (inside a test class), we can run the command:
<br>
* Command Structure: <b> php artisan test --filter "ClassName::methodName" </b> <br>
* Example: <b> php artisan test --filter "ProductRegistrationTest::testUserCanRegisterProductWithValidData"
</b>


# Notes from Lei

Implemented Features:
1. User Authentication
2. Create a product
3. Edit a product
4. Delete a product
5. View Products

Bonus Implementations
1. Test Cases (except Product Registration)
2. Caching Response (for fetching product details)
3. Followed Repository design pattern
4. Utilized Database Seeders to initialize table data

