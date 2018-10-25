<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Video Entity
 *
 * @property int $id
 * @property string $title
 * @property string $video_url
 * @property int $created_by
 * @property int $edited_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $updated_on
 * @property int $is_deleted
 */
class Video extends Entity
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
        'video_url' => true,
        'created_by' => true,
        'edited_by' => true,
        'created_on' => true,
        'updated_on' => true,
        'is_deleted' => true
    ];
}
