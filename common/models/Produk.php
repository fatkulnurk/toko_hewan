<?php

namespace common\models;

use Yii;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "produk".
 *
 * @property int $id
 * @property string $nama
 * @property string $berat
 * @property string $spesies
 * @property int $harga
 * @property string $deskripsi
 * @property string $gambar
 */
class Produk extends \yii\db\ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'berat', 'spesies', 'harga', 'deskripsi'], 'required'],
            [['harga'], 'integer'],
            [['deskripsi'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['berat'], 'string', 'max' => 30],
            [['spesies'], 'string', 'max' => 40],
            [['gambar'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'berat' => 'Berat',
            'spesies' => 'Spesies',
            'harga' => 'Harga',
            'deskripsi' => 'Deskripsi',
            'gambar' => 'Gambar',
        ];
    }
}
