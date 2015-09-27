<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SupplierItem Entity.
 */
class SupplierItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'status' => true,
        'supplier' => true,
        'item' => true,
    ];
}
