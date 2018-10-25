<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AcademicCalender Entity
 *
 * @property int $id
 * @property int $master_category_id
 * @property string $title
 * @property \Cake\I18n\FrozenDate $calender_date
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 *
 * @property \App\Model\Entity\MasterCategory $master_category
 */
class AcademicCalender extends Entity
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
        'master_category_id' => true,
        'title' => true,
        'calender_date' => true,
        'created_on' => true,
        'updated_on' => true,
        'master_category' => true
    ];
}
