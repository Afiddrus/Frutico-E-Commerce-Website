<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'method' => 'post',
            ],
            'onclick' => '
        event.preventDefault();
        const deleteUrl = $(this).attr("href");
        Swal.fire({
            title: "Are you sure?",
            text: "You won\'t be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Menggunakan fetch API untuk mengirim permintaan DELETE
                fetch(deleteUrl, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-Token": $("meta[name=csrf-token]").attr("content"),
                    },
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "The item has been deleted.",
                            icon: "success",
                        }).then(() => {
                            // Anda dapat juga memperbarui grid atau melakukan tindakan lain yang diperlukan di sini
                            location.reload(); // Contoh: Memuat ulang halaman
                        });
                    } else {
                        Swal.fire("Error!", "An error occurred while deleting.", "error");
                    }
                })
                .catch(() => {
                    Swal.fire("Error!", "An error occurred while deleting.", "error");
                });
            }
        });
    '
        ]) ?>




    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'image',
                'format' => ['html'],
                'value' => fn () => Html::img($model->getImageUrl(), ['style' => 'width: 50px'])
            ],
            'name',
            'description:html',

            // 'image' => fn () => Html::img($model->getImageUrl(), ['style' => 'width: 50px']),
            // 'image' => function() use($model) {
            //     return Html::img($model->getImageUrl(), ['style' => 'width: 50px']);
            // },
            'price:currency',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => fn () =>                 Html::tag('span', $model->status ? 'Active' : 'Draft', [
                    'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                ]),
            ],
            'created_at:datetime',
            'updated_at:datetime',
            'createdBy.username',
            'updatedBy.username',
        ],
    ]) ?>

</div>