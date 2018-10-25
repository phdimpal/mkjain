<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property int $id
 * @property string $title
 * @property string $message
 * @property \Cake\I18n\FrozenDate $notify_date
 * @property \Cake\I18n\FrozenTime $notify_time
 * @property string $notify_link
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $created_by
 * @property int $edited_by
 * @property int $is_deleted
 */
class Notification extends Entity
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
        'title' => true,
        'message' => true,
        'notify_date' => true,
        'notify_time' => true,
        'notify_link' => true,
        'created_on' => true,
        'updated_on' => true,
        'created_by' => true,
        'edited_by' => true,
        'is_deleted' => true
    ];
}
