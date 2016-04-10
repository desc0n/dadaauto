<div class="wrapper">
    <div class="pay">
        <div class="pay-top">
            <h2>Доставка</h2>
        </div>
        <div class="pay-body">
            <p><i class="glyphicon glyphicon-chevron-right"></i> Доставка по Владивостоку при покупке от 10 000 руб. - Бесплатно.</p>
            <p><i class="glyphicon glyphicon-chevron-right"></i> Доставка в другие города, осуществляется любой транспортной компанией.</p>
            <p><i class="glyphicon glyphicon-chevron-right"></i> Доставка до транспортной компании от 300 руб. до 1500 руб.</p>
        </div>
    </div>
    <div class="pay">
        <div class="pay-top">
            <h2>Оплата</h2>
        </div>
        <div class="pay-body">
            <p><i class="glyphicon glyphicon-chevron-right"></i> Реквизиты для оплаты вы можете узнать: По телефону у наших менеджеров или нажав кнопку "Запросить реквизиты"</p>
            <p><i class="glyphicon glyphicon-chevron-right"></i> После нажатия на кнопку, к вам на почту придут наши реквизиты и пояснения к оплате.</p>
            <p><a id="btn_response" href="#"><input type="submit" id="give-response-submit" value="Запросить реквизиты" /></a></p>
            <p><h3>Внимание!</h3></p>
            <p><i class="glyphicon glyphicon-chevron-right"></i> После оплаты, всегда сохраняйте квитанцию, до получения товара.</p>
        </div>
    </div>
    <div class="text-center"><img src="/public/i/map.png"></div>
</div>
<div class="push"></div>
<div id="respond">
    <a class="button bClose" href="#"><span>X</span></a>
    <h2 style="text-align:center;">Оставить запрос </h2>
    <div id="respondBody">
        <!--<p class="comment-form-author">
            <label for="email">Ваш e-mail</label><br />
            <input id="email" name="email" type="text" size="50" required='true' placeholder="e-mail"/>
        </p>
        <p class="form-submit">
            <input class="submit" type="button" id="askRequisites" value="Запросить реквизиты" />
        </p>-->
        <div class="alert alert-success">В разработке</div>
    </div>
</div>
<script>
    $(function() {
        $('#btn_response').bind('click', function(e) {
            e.preventDefault();
            $('#respond').bPopup();
        });


        $('#askRequisites').click(function(){
            if ($('#email').val() == '') {
                alert('Укажите адрес электронной почты!');

                return false;
            }

            $.ajax({type: 'POST', url: '/ajax/ask_requisites', async: true, data:{
                    email: $('#email').val()
                }})
                .done(function(data){
                    $('#askRequisites').remove();
                    $('#respondBody').html('<div class="alert alert-success"><strong>Запрос успешно отправлен!</strong><br /> Ожидайте ответа.</div>');
                });

        });
    });
</script>