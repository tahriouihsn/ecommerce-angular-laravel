# The Api


## Some Api Requests

- To Access the POST/PUT/DELETE of the Product controller you will need to be logged in as a seller account.
- The user Acount Can't add their own products.  
- Only the get method that is accessible without authentication. 

* **Add a new Product** 

`POST: localhost:8000/api/products`

```
    {
        "name": "Product Name ", 
        "category_id": 2, 
        "price": 22, 
        "description": "this Product's desciption."
    }
```

* **Update an Existing product**

`PUT: localhost:8000/api/products/1`

```
    {
        "id" : 1
        "name": "Product Name ", 
        "category_id": 2, 
        "price": 22, 
        "description": "this Product's desciption."
    }
```

* **Add a Product to an Cart**. 

`POST: localhost:8000/api/products/add-to-cart`

```
    {
        "product_id" : 3, 
        "quantity": 2
    }
```

* The Api verifies if there is already an existing active Cart to add the product to. else it creates a new one and add the prouct. 


*  **Add a Review**

For this Request you need to be Looged in first. 

`POST: localhost:8000/api/reviews`
{
    "product_id" : 3, 
    "comment" : "this product is fine", 
    "rate" : 5
}


## Some Api Responses 

* **Get One Product**

`GET: localhost:8000/api/products/1`

```
    {
    "data": {
        "id": 1,
        "name": "Ricardo Denesik",
        "price": 0,
        "description": "Rerum est id nostrum. Voluptas est molestiae temporibus quia.",
        "seller_Name": "Lavinia Fahey",
        "orders_count": 0,
        "images": [
            {
                "id": 9,
                "path": "https://e-coopera.com/ecoopera2/ecoopera2/public/storage/products/BlQb3c2027bcL7TtYXBXeGIpyV4KY6Rr2whMiCV0.jpeg",
                "updated_at": "2020-05-08T07:05:42.000000Z",
                "created_at": "2020-05-08T07:05:42.000000Z"
            },
            {
                "id": 25,
                "path": "https://e-coopera.com/ecoopera2/ecoopera2/public/storage/products/BlQb3c2027bcL7TtYXBXeGIpyV4KY6Rr2whMiCV0.jpeg",
                "updated_at": "2020-05-08T07:05:42.000000Z",
                "created_at": "2020-05-08T07:05:42.000000Z"
            }
        ],
        "reviews": [
            {
                "comment": "Dolores laborum est incidunt inventore.",
                "rate": 5,
                "user_name": "Chadd Kautzer"
            },
            {
                "comment": "Saepe ut ab hic dolor neque numquam.",
                "rate": 0,
                "user_name": "Chadd Kautzer"
            },
            {
                "comment": "Pariatur ipsa ullam qui eum et aut.",
                "rate": 4,
                "user_name": "Lavinia Fahey"
            }
        ]
    }
}
```


* **User Profile**

`GET: localhost:8000/api/profile`

```
{
    "id": 11,
    "name": "your name",
    "user_name": "your Email",
    "email": "your Email",
    "cooperative_id": 1,
    "role_id": 3,
    "is_email_verified": 1,
    "is_deleted": 0,
    "is_activated": 1,
    "email_verified_at": "2020-05-08T07:09:25.000000Z",
    "created_at": "2020-05-08T07:08:59.000000Z",
    "updated_at": "2020-05-08T07:09:25.000000Z"
}

```