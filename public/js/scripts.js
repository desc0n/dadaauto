$(document).ready(function() {
    $('#sendReview').click(function(){
        if ($('#author').val() == '') {
            alert('Укажите свое имя!');

            return false;
        }
        if ($('#comment').val() == '') {
            alert('Введите текст отзыва!');

            return false;
        }
        if ($('#city').val() == '') {
            alert('Укажите свой адрес!');

            return false;
        }
        $.ajax({type: 'POST', url: '/ajax/add_review', async: true, data:{
            author: $('#author').val(),
            city: $('#city').val(),
            comment: $('#comment').val(),
        }})
        .done(function(data){
            $('#sendReview').remove();
            $('#respond .modal-body').html('<div class="alert alert-success"><strong>Отзыв успешно отправлен!</strong><br /> Ваш отзыв появится на сайте после проверки модератором. Спасибо!.</div>');
        });

    });
});