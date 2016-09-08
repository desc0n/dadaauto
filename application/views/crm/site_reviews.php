<div class="row">
    <h2 class="sub-header col-md-12">Список отзывов</h2>
    <table class="table table-bordered">
        <tr>
            <th class="text-left col-md-2">Автор</th>
            <th class="text-left col-md-2">Город</th>
            <th>Текст отзыва</th>
            <th class="text-center">Статус</th>
            <th class="text-center col-md-2">Действия</th>
        </tr>
        <?foreach ($showedReviewsData as $review) {?>
        <tr>
            <td><?=$review['author'];?></td>
            <td><?=$review['city'];?></td>
            <td><?=$review['content'];?></td>
            <td class="text-center">опубликован</td>
            <td class="text-center">
                <form method="post">
                    <button class="btn btn-warning" title="Скрыть отзыв" name="unshowreview" value="<?=$review['id'];?>"><span class="glyphicon glyphicon-eye-close"></span> </button>
                    <button class="btn btn-danger" title="Удалить отзыв" name="deletereview" value="<?=$review['id'];?>"><span class="glyphicon glyphicon-remove"></span> </button>
                </form>
            </td>
        </tr>
        <?}?>
        <?foreach ($unshowedReviewsData as $review) {?>
        <tr>
            <td><?=$review['author'];?></td>
            <td><?=$review['city'];?></td>
            <td><?=$review['content'];?></td>
            <td class="text-center">не опубликован</td>
            <td class="text-center">
                <form method="post">
                    <button class="btn btn-success" title="Показать отзыв" name="showreview" value="<?=$review['id'];?>"><span class="glyphicon glyphicon-eye-open"></span> </button>
                    <button class="btn btn-danger" title="Удалить отзыв" name="deletereview" value="<?=$review['id'];?>"><span class="glyphicon glyphicon-remove"></span> </button>
                </form>
            </td>
        </tr>
        <?}?>
    </table>
</div>