API DOCUMENTATION
====
## Variables

`BASE_URL`: http://127.0.0.1:8000

------

**Api name:** warehouse<br/>
**Path:** {{BASE_URL}}/api/v1/warehouse<br/>
**Method:** GET<br/>
**Column types:** `products`: list, `product_code`: string, `count`: int

# Request: #
 
    "products":[
        {
            "product_code": "11",
            "count": 30
        },
        {
            "product_code": "22",
            "count": 20
        }
    ]
# Response: #
    [
        {
            "product_name": "Koylak",
            "product_qty": 30,
            "product_materials": [
                {
                    "warehouse_id": 1,
                    "material_name": "IP",
                    "qty": 40,
                    "price": 1500
                },
                {
                    "warehouse_id": 5,
                    "material_name": "IP",
                    "qty": 260,
                    "price": 550
                },
                {
                    "warehouse_id": 2,
                    "material_name": "Mato",
                    "qty": 12,
                    "price": 2300
                },
                {
                    "warehouse_id": 4,
                    "material_name": "Mato",
                    "qty": 12,
                    "price": 1600
                },
                {
                    "warehouse_id": 3,
                    "material_name": "Tugma",
                    "qty": 150,
                    "price": 3100
                }
            ]
        },
        {
            "product_name": "shim",
            "product_qty": 20,
            "product_materials": [
                {
                    "warehouse_id": 4,
                    "material_name": "Mato",
                    "qty": 28,
                    "price": 1600
                },
                {
                    "warehouse_id": 5,
                    "material_name": "IP",
                    "qty": 40,
                    "price": 550
                },
                {
                    "warehouse_id": null,
                    "material_name": "IP",
                    "qty": 260,
                    "price": null
                },
                {
                    "warehouse_id": 6,
                    "material_name": "Zamok",
                    "qty": 20,
                    "price": 2000
                }
            ]
        }
    ]
