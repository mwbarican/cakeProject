<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InventoryFixture
 *
 */
class InventoryFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'inventory';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'item_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP(6)', 'comment' => '', 'precision' => null],
        'location_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'unit_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'location_id' => ['type' => 'index', 'columns' => ['location_id'], 'length' => []],
            'unit_id' => ['type' => 'index', 'columns' => ['unit_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['item_id', 'created'], 'length' => []],
            'inventory_ibfk_1' => ['type' => 'foreign', 'columns' => ['item_id'], 'references' => ['item', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'inventory_ibfk_2' => ['type' => 'foreign', 'columns' => ['location_id'], 'references' => ['location', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'inventory_ibfk_3' => ['type' => 'foreign', 'columns' => ['unit_id'], 'references' => ['unit', 'id'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'item_id' => 1,
            'created' => 1438539569,
            'location_id' => 1,
            'quantity' => 1,
            'unit_id' => 1
        ],
    ];
}
