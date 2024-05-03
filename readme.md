# PHP Phonebook API

This repository contains a simple PHP CRUD (Create, Read, Delete) API for managing a phonebook. It utilizes a JSON file for data storage, eliminating the need for complex database setups.

## Usage

To start the server, run the following command:

```
php -S localhost:8000 -t ./
```

### Allowed Routes

- **GET** `localhost:8000/` - Displays the phonebook and a form for adding new contacts.
- **GET** `localhost:8000/delete_contact.php?index={index}` - Deletes a contact where index is the array index of the contact in the contacts.json file.
- **POST** `localhost:8000/add_contact.php` - Adds a new contact. Submit the form on the main page to create a new contact with fields for name and phone.

## Configuration

No database configuration is required as this application uses a JSON file (contacts.json) for storing contact data. Make sure this file is writable by the server.


Contacts are stored in JSON format in the contacts.json file. Here's an example of how contact data is structured:

  ```json
[
  {
    "name": "John Doe",
    "phone": "123-456-7890"
  },
  {
    "name": "Jane Doe",
    "phone": "098-765-4321"
  }
]
  ```

Each contact is an object with name and phone fields.


