<?php
namespace App\Model;


class Product
{
    private  ?int $id;
    private  string $name;
    private  string $category;
    private  float $price;
    private  string $description;
    private  string $image;

        // Constructeur pour initialiser la classe
        public function __construct(int|null $id, string $name, string $category, float $price, string $description, string $image)
        {
            $this->id = $id;
            $this->name = $name;
            $this->category = $category;
            $this->price = $price;
            $this->description = $description;
            $this->image = $image;
        }

        public function getId()
        {
            return $this->id;
        }

        /**
         * Get the value of brand
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * Set the value of model
         *
         * @return  self
         */
        public function setName($name)
        {
            $this->name = $name;
        }

                /**
         * Get the value of brand
         */
        public function getCategory()
        {
            return $this->category;
        }

        /**
         * Set the value of model
         *
         * @return  self
         */
        public function setCategory($category)
        {
            $this->category = $category;
        }

        /**
         * Get the value of brand
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * Set the value of model
         *
         * @return  self
         */
        public function setPrice($price)
        {
            $this->price = $price;
        }

        /**
         * Get the value of brand
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * Set the value of model
         *
         * @return  self
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }

        /**
         * Get the value of image
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */
        public function setImage($image)
        {
            $this->image = $image;
        }


}




