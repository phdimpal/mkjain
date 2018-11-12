<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimeTable Entity
 *
 * @property int $id
 * @property int $master_role_id
 * @property int $master_class_id
 * @property int $master_section_id
 * @property int $master_subject_id
 * @property int $registration_id
 * @property string $week_name
 * @property \Cake\I18n\FrozenTime $start_time
 * @property \Cake\I18n\FrozenTime $end_time
 * @property int $number_of_minute
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\MasterRole $master_role
 * @property \App\Model\Entity\MasterClass $master_class
 * @property \App\Model\Entity\MasterSection $master_section
 * @property \App\Model\Entity\MasterSubject $master_subject
 * @property \App\Model\Entity\Registration $registration
 */
class TimeTable extends Entity
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
        'master_role_id' => true,
        'master_class_id' => true,
        'master_section_id' => true,
        'master_subject_id' => true,
        'registration_id' => true,
        'week_name' => true,
        'start_time' => true,
        'end_time' => true,
        'number_of_minute' => true,
        'created_on' => true,
        'updated_on' => true,
        'is_deleted' => true,
        'master_role' => true,
        'master_class' => true,
        'master_section' => true,
        'master_subject' => true,
        'registration' => true
    ];
}
