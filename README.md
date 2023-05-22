
# Assignment 14
Question 1:
You have a Laravel application with a form that submits user information using a POST request. Write the code to retrieve the ```'name'``` input field value from the request and store it in a variable called ```$name```.
```php
$name = $request->input('name');
```

Question 2:
In your Laravel application, you want to retrieve the value of the ```'User-Agent'``` header from the current request. Write the code to accomplish this and store the value in a variable called ```$userAgent```.

```php
$userAgent = $request->header('User-Agent');
```

Question 3:
You are building an API endpoint in Laravel that accepts a GET request with a ```'page'``` query parameter. Write the code to retrieve the value of the ```'page'``` parameter from the current request and store it in a variable called ```$page```. If the parameter is not present, set ```$page``` to null.

```php
$userAgent = $request->header('User-Agent');
```

Question 4:
Create a JSON response in Laravel with the following data:
```json
{
    "message": "Success",
    "data": {
        "name": "John Doe",
        "age": 25
    }
}
```

```php
$data = [
    'message' => 'Success',
    'data' => [
        'name' => $name ? $name : 'John Doe',
        'age' => 25
    ]
]; 

return response()->json($data);
```
Question 5:
You are implementing a file upload feature in your Laravel application. Write the code to handle a file upload named ```'avatar'``` in the current request and store the uploaded file in the ```'public/uploads'``` directory. Use the original filename for the uploaded file.

```php
function fileUpload(Request $request){
    $message = 'Error!';
    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $filename = $file->getClientOriginalName();
        if($file->move(public_path('uploads'), $filename)){
            $message = 'Success!';
        }
    }
    
    $data = [
        'message' => $message
    ];

    return response()->json($data);
}
```

Question 7:
Create a route in Laravel that handles a POST request to the ```'/submit'``` URL. Inside the route closure, retrieve the ```'email'``` input parameter from the request and store it in a variable called ```$email```. Return a JSON response with the following data:
```json
{
    "success": true,
    "message": "Form submitted successfully."
}
```
```php
Route::post('/submit', function (Request $request) {
    $email = $request->input('email');

    $data = [
        'success' => true,
        'message' => 'Form submitted successfully.'
    ];

    return response()->json($data);
});
```