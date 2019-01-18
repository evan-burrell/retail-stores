# Magento 2 Retail Stores Module

![Style CI](https://styleci.io/repos/166373868/shield)

## Stores:
Magento module that shows a static list of retail stores.
* A Store entity has been created.
  * Stores have fields: Name, Address Line 1, Address Line 2, Postcode, Latitude, Longitude, Opening and Closing Hours
  * Stores can be created/updated/deleted from the admin panel, and are visible through a grid, similar to Products and Brands.
* A Store product attribute has been created.
  * The attribute is a drop down
  * The attribute options are driven by the brand entities data.
  * When viewing a PDP, brand information appears in more information.
  * Attribute data must be stored in quote item, order item and surfaced through the API.
* Stores can be viewed in the frontend, via /store/{code}
  * This page will be called a Store Details Page
  * A Store details page will show the brand info (name, description and image) as well as a listing of all products associated to it. The product list is paginated. 
  * A store details page will also show how long until a store opens/closes.
