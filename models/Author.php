<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%author}}".
 *
 * @property int $id
 * @property string|null $name
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%author}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['name'], 'string', 'max' => 255],
            ['name', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя автора',
            'booksCount' => 'Количество книг',
            'books' => 'Книги'
        ];
    }

    public function getBooks(){
        return $this->hasMany(Book::class, ['author_id' => 'id']);
    }

    public function getBooksCount(){
        return $this->getBooks()->count();
    }

    public function beforeDelete(){
        if(parent::beforeDelete()){
            foreach($this->books as $book){
                $book->delete();
            }
            return true;
        }
        return false;
    }

}
