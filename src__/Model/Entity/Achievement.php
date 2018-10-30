<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Achievement Entity
 *
 * @property int $id
 * @property string $achivement_year
 * @property int $student_id
 * @property string $achivement
 * @property string $achivement_rank
 * @property \Cake\I18n\FrozenDate $achivement_date
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $created_by
 * @property int $edited_by
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\Student $student
 */
class Achievement extends Entity
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
        'achivement_year' => true,
        'student_id' => true,
        'achivement' => true,
        'achivement_rank' => true,
        'achivement_date' => true,
        'created_on' => true,
        'updated_on' => true,
        'created_by' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'student' => true
    ];
}
