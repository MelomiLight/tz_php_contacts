<?php

class ProductValidator
{
    public static function validateProductData($data)
    {

        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            return ['error' => 'Invalid JSON data'];
        }


        $requiredFields = ['title', 'description', 'price'];
        foreach ($requiredFields as $field) {
            if (!isset ($data[$field]) || empty ($data[$field])) {
                return ['error' => "Missing required field: $field"];
            }
        }


        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];



        if (!is_string($title) || strlen($title) > 255) {
            return ['error' => 'Title must be a string with a maximum length of 255 characters'];
        }


        if (!is_string($description)) {
            return ['error' => 'Description must be a string'];
        }


        if (!is_numeric($price) || $price <= 0) {
            return ['error' => 'Price must be a positive number'];
        }


        return true;
    }
}
