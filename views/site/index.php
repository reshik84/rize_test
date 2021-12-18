<?php

use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2>Авторы и книги</h2>
                <?php echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'name',
                        [
                            'attribute' => 'books',
                            'value' => function ($model){
                                $out = '';
                                foreach ($model->books as $book){
                                    $out .= $book->title . '<br>';
                                }
                                return $out;
                            },
                            'format' => 'raw'
                        ],
                    ]
                ]); ?>
            </div>
        </div>

    </div>
</div>
