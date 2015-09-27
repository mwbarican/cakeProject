<?php
namespace App\Model\Table;

use App\Model\Entity\AdminImage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdminImage Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Admin
 */
class AdminImageTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('admin_image');
        $this->displayField('admin_id');
        $this->primaryKey(['admin_id', 'id']);
		$this->addBehavior('Utils.Uploadable', [
			'admin_id' => [
				'fields' => [
					'size' => 'file_size'
				]
			],
		]);
        $this->belongsTo('Admin', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->allowEmpty('file_directory');
            
        $validator
            ->requirePresence('file_size', 'create')
            ->notEmpty('file_size');
            
        $validator
            ->requirePresence('file_path', 'create')
            ->notEmpty('file_path');
            
        $validator
            ->requirePresence('file_name', 'create')
            ->notEmpty('file_name');
            
        $validator
            ->requirePresence('file_type', 'create')
            ->notEmpty('file_type');

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
        $rules->add($rules->existsIn(['admin_id'], 'Admin'));
        return $rules;
    }
}
