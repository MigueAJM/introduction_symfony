<?php

namespace TestBundle\Controller;

use Utilerias\SQLBundle\Model\SQLModel;

class DefaultModel extends SQLModel
{
    /**
     * get all products or one product
     * @return Array ['status', 'data']
     */
    public function getProductsOrProduct(String $schema, Array $columns, Array $condition, Array $order = [])
    {
        $this->setSchema($schema);
        return $this->selectFromTable('products',$columns, $condition, $order);
    }

    /**
     * insert product.
     * @return Array ['status', 'data']
     */
    public function insertProduct(String $schema, Array $values, Int $id)
    {
        $this->setSchema('public');
        $query = $this->insertIntoTable('products',$values, $id);
        return $this->executeQuery($query);
    }
}