<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Leave Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $from_date
 * @property \Cake\I18n\FrozenDate $to_date
 * @property string $reason
 * @property string $status
 * @property int $registration_id
 * @property int $no_of_days
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $approved_by
 * @property \Cake\I18n\FrozenDate $approved_date
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\Registration $registration
 */
class Leave extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'from_date' => true,
        'to_date' => true,
        'reason' => true,
        'status' => true,
        'registration_id' => true,
        'no_of_days' => true,
        'created_on' => true,
        'updated_on' => true,
        'approved_by' => true,
        'approved_date' => true,
        'is_deleted' => true,
        'registration' => true
    ];
}
