<?php
namespace App\Model\Table;

use App\Model\Entity\Inventory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventory Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Item
 * @property \Cake\ORM\Association\BelongsTo $Location
 * @property \Cake\ORM\Association\BelongsTo $Unit
 */
class InventoryTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('inventory');
        $this->displayField('item_id');
        $this->primaryKey('created');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Item', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Location', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Unit', [
            'foreignKey' => 'unit_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('quantity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['item_id'], 'Item'));
        $rules->add($rules->existsIn(['location_id'], 'Location'));
        $rules->add($rules->existsIn(['unit_id'], 'Unit'));
        return $rules;
    }
}
