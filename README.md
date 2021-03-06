# iThinkWeb Backend developer coding test

## Task
You're tasked to create a simple REST web service application for an e-commerce app using Laravel.

You need to develop APIs for creating and viewing a single product. There should also be an API for viewing a list of the products.

A product needs to have the following information:

- Product name
- Product description
- Product price
- Created at
- Updated at

## Requirements
- The product name should have a maximum of 255 characters, and the product price should be numeric that accepts up to two decimal places.
- The created at and updated at fields should be in timestamp format.
- The view products list API needs to be paginated.
- You are required to use MySQL for the database storage in this test.
- You are free to use any library or component just as long as it can be installed using Composer.
- Don't forget to provide instructions on how to set the application up.

## Optional (for bonus points)
- Cache the view single product API. You are free to use any cache driver
- Create automated tests for the APIs
- Say for example, we need a feature where we can display featured products. How would you go about implementing this feature? (You don't need to write code for this, just describe how would you implement it)


# Instructions on how to set up the application.
## Prerequisites:
- Rename .env.example to .env
- php artisan key:generate
- composer install (Composer 2.1.1)
- Create a database named "backend_coding_test"
- php artisan migrate

## Populate the product data:
- php artisan tinker
- Product::factory()->count(100)->create()

## Automated Testing
- php artisan test

## APIs Protected are by Passport
- They are protected by Passport. First you need to register on this route "api/register" use this payload keys to register: name, email, password.
- After registering you need to login using this route "api/login" use this payload keys to login: email, password. You'll receive token as a response.
- Use the token in your Authorization Header with this format "Bearer YOUR_TOKEN".

## Say for example, we need a feature where we can display featured products. How would you go about implementing this feature?
- Create a column in Products table "featured" with datatype of tinyint(1) 1 if you want to display as featured then 0 don't display as featured.
- Have front-end that selects items to be featured.
- Then get data where you only want records with columns "featured" is 1.
