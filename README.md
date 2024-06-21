<a name="readme-top"></a>

<div align="center">
    <h3 align="center">Backend Developer coding test</h3>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-test">About the test</a>
    </li>
    <li>
      <a href="#requirements">Requirements</a>
      <ul>
        <li><a href="#product-specifications">Product specifications</a></li>
        <li><a href="#api-requirements">API Requirements</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li>
      <a href="#bonus-points">Bonus points</a>
    </li>
  </ol>
</details>

<!-- ABOUT THE TEST -->
## About the test

You're tasked to create a simple REST web service application for a fictional e-commerce business using Laravel.

You need to develop the following REST APIs:

* Products list
* Product detail
* Create product
* Update product
* Delete product

<!-- REQUIREMENTS -->
## Requirements

### Product specifications

A product needs to have the following information:

* Product name
* Product description
* Product price
* Created at
* Updated at

### API requirements

* Products list API
    * The products list API must be paginated.
* Create and Update product API
    * The product name, description, and price must be required.
    * The product name must accept a maximum of 255 characters.
    * The product price must be numeric in type and must accept up to two decimal places.
    * The created at and updated at fields must be in timestamp format.

Others:
* You are required to use MYSQL for the database storage in this test.
* You are free to use any library or component just as long as it can be installed using Composer.
* Don't forget to provide instructions on how to set the application up.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

* Git
* Composer
* PHP ^8.0.2
* MySQL

### Installation

* Create a new repository under your account named `{FIRST NAME}-{LAST NAME}-coding-test`. (e.g. `john-doe-coding-test`)
* Push your code to the new repository.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- BONUS POINTS -->
## Bonus points

#### For bonus points:

* Cache the response of the Product detail API. You are free to use any cache driver.
* Use the Service layer and Repository design patterns.
* Create automated tests for the app.

#### Answer the question below by updating this file.

Q: The management requested a new feature where in the fictional e-commerce app must have a "featured products" section.
How would you go about implementing this feature in the backend?

A: 
Implementing a featured products section would entail modifications in the database, the Products API, and the MVC implementations.

1. Add a column, such as flag or featured, to the products table that can have a Boolean value by creating a new migration file.
2. Plan where to place the featured section in the user interface, which might involve re-adjusting the positions of existing elements. Additionally, add new action buttons on table rows to trigger which product should be featured or removed from the featured section.
3. Configure the REST API:<br>
	a. Add getter and setter functions in the ProductRepositoryInterface and implement the functionality in the ProductRepository file. <br>
	b. Create and update controller functions to handle the featured section. <br>
	c. Add routes for the new methods in the web.php file. <br>
4. Connect the view to the added methods by creating new AJAX function calls to handle the requests and update the view accordingly.
5. Test the integration of the featured section and debug accordingly.
