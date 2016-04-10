<div class="container">
    <div class="row">
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="map">

            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="map">
                <img src="/public/i/map.png" alt="Карта">
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="map">

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div id="pay">
                <div class="pay-top">
                    <p class="navbar-text"><i class="glyphicon glyphicon-blackboard"></i>  Доставка</p>
                </div>
                <div class="pay-body">
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Доставка по Владивостоку при покупке от 10 000 руб. - Бесплатно.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Доставка в другие города, осуществляется любой транспортной компанией.</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Доставка до транспортной компании от 300 руб. до 1500 руб.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div id="pay">
                <div class="pay-top">
                    <p class="navbar-text"><i class="glyphicon glyphicon-credit-card"></i>  Оплата</p>
                </div>
                <div class="pay-body">
                    <p><i class="glyphicon glyphicon-chevron-right"></i> Реквизиты для оплаты вы можете узнать: По телефону у наших менеджеров или нажав кнопку "Запросить реквизиты"</p>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> После нажатия на кнопку, к вам на почту придут наши реквизиты и пояснения к оплате.</p>
                    <a href="#myModalBox" class="btn btn-lg btn-danger" data-toggle="modal">Запросить реквизиты</a>

                    <div id="myModalBox" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Заголовок модального окна -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Форма запроса реквизитов</h4>
                                </div>
                                <!-- Основной текст сообщения -->
                                <div class="modal-body">
                                    <form action="/pay" method="post">
                                        <input type="email" name="email" placeholder="Ваш E-mail">
                                        <input class="btn btn-danger" type="submit" name="enter" value="Запросить реквизиты">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <b>Внимание!</b>
                    <p><i class="glyphicon glyphicon-chevron-right"></i> После оплаты, всегда сохраняйте квитанцию, до получения товара.</p>
                </div>
            </div>
        </div>
    </div>
</div>