<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterExam Entity
 *
 * @property int $id
 * @property string $exam_type
 * @property int $flag
 * @property int $class_id
 * @property int $section_id
 * @property int $subject_id
 *
 * @property \App\Model\Entity\Class $class
 * @property \App\Model\Entity\Section $section
 * @property \App\Model\Entity\Subject $subject
 */
class MasterExam extends Entity
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
        'exam_type' => true,
        'flag' => true,
        'class_id' => true,
        'section_id' => true,
        'subject_id' => true,
        'class' => true,
        'section' => true,
        'subject' => true
    ];
}
