# Thoughts about the code

The Repository Pattern abstracts the communication betweeen application code and database, simplyfying maintenance and testing.

The problem with this pattern in Laravel app is that it ignores the existence of Eloquent, which is in itself a data access abstraction.

I like the use of Carbon as date/time management for flexibility and precision.

I do not advice env helper function on controller because it does not guarantee the proper value.

Define Roles in constants inside the Model for the system's reliability and adaptability, eliminating potential production bugs stemming from server discrepancies or future changes.
```php
$request->__authenticatedUser->user_type == Role::ADMIN_ROLE || $request->__authenticatedUser->user_type == Role::SUPERADMIN_ROLE
```


# Refactoring to Actions and Services

Extracting logic to Actions makes that action callable from multiple places in our app, it also makes the code easier to test.
<ul>
<li>Put all non-CRUD methods in its own controller.</li> 
<li>Create Action classes to take care of the very specific tasks</li>
</ul>

Separating the business specific operations increaseses code reusability, and making the code organise and maintainable. 
<ul>
<li>Create Service classes to perform complex tasks.</li>
<li>Interface things out and use Strategy pattern.</li>
<li>Use Dependency Injection.</li>
</ul>

Implement coding style and principles
<ul>
<li>Put all database related logic into Eloquent models.</li>
<li>Create Form Request classes for more complex validation and authorization logic.</li>
<li>Generate Resources class to provide more control over the response.</li>
<li>Implement Gates and Policies for handling authentication and authorization</li>
<li>Follow Locality of Behavior principle</li>
<li>Write PHP Code with strict typing</li>
</ul>
