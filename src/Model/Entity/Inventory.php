<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity.
 */
class Inventory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'item_id' => true,
        'location_id' => true,
        'quantity' => true,
        'unit_id' => true,
        'item' => true,
        'location' => true,
        'unit' => true,
    ];
}
