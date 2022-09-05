# HTUPOS API 

This API was build for htupos application users .


GET '/' - tests if the API is working .....

Fetches nothing ,It just returns an empty body.
Request Argument: None.
Returns: An object  AS:
 { 
    "success": boolean,
     "message_code": string, 
     "body": array }

Errors: None.

 # GET '/items' - return all the stored items in the database.

Fetches collection of items.
Request Arguemnt: None.
Returns: An object As : { 
    "success": boolean, 
    "message_code": string, 
    "body": [ "items": [object], "items_count": integer ] }

Errors: 400 - if no item was found.

# POST '/items' - new  items

It creates new items and add them to the DB.
Request Arguemnt: JSON data:{"name": string}
Returns: An object AS : { 
    "success": boolean, 
    "message_code": string, 
    "body": [] }

Errors: 400 - if item was not created.
PUT '/items' - update  item quantity  .

update the quantity of the to the DB.
Request Arguemnt: JSON data:{"id": integer, "quantity": boolean}
Returns: An object as : {
     "success": boolean, 
     "message_code": string,
      "body": [] }


rrors: 400 - if item quantity was not updated.


# DELETE '/items' - delete an item.

Delete item from the DB.
Request Arguemnt: JSON data:{"id": integer}
Returns: An object as : { 
    "success": boolean,
     "message_code": string,
      "body": [] }

Errors: 400 - if item was not deleted.

# status code :
successfull_response: For testing API.
no_items_found: no item was found in the GET /items.
empty_json_response: for sending empty json data.
item_name_not_available: for sending json data without name.
new_item_added: when new item is added.
item_id_not_available: for sending json data without id.
item_quantity_not_available: for sending json data without quantity.
item_updated: when quantity is available is updated.
item_deleted: when item was deleted.