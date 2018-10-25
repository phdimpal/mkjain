<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Complain Entity
 *
 * @property int $id
 * @property int $complain_type_id
 * @property string $name
 * @property string $email_id
 * @property string $mobile_no
 * @property int $master_class_id
 * @property int $master_section_id
 * @property int $query_reason
 * @property int $master_role_id
 * @property int $registration_id
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $is_deleted
 * @property int $created_by
 *
 * @property \App\Model\Entity\ComplainType $complain_type
 * @property \App\Model\Entity\Email $email
 * @property \App\Model\Entity\MasterClass $master_class
 * @property \App\Model\Entity\MasterSection $master_section
 * @property \App\Model\Entity\MasterRole $master_role
 * @property \App\Model\Entity\Registration $registration
 */
class Complain extends Entity
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
        'complain_type_id' => true,
        'name' => true,
        'email_id' => true,
        'mobile_no' => true,
        'master_class_id' => true,
        'master_section_id' => true,
        'query_reason' => true,
        'master_role_id' => true,
        'registration_id' => true,
        'created_on' => true,
        'updated_on' => true,
        'is_deleted' => true,
        'created_by' => true,
        'complain_type' => true,
        'email' => true,
        'master_class' => true,
        'master_section' => true,
        'master_role' => true,
        'registration' => true
    ];
}
