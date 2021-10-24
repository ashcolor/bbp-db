<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Music Entity
 *
 * @property int $id
 * @property int $no
 * @property string $genre
 * @property string $name
 * @property string $artist
 * @property string $contributor
 * @property \Cake\I18n\FrozenTime $time
 * @property int $part
 * @property bool $lyric
 * @property string $remarks
 * @property string $code
 * @property \Cake\I18n\FrozenTime $delivery_datetime
 */
class Music extends Entity
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
        'id' => true,
        'no' => true,
        'genre' => true,
        'name' => true,
        'artist' => true,
        'contributor' => true,
        'time' => true,
        'part' => true,
        'lyric' => true,
        'remarks' => true,
        'code' => true,
        'delivery_datetime' => true
    ];
}
