<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="slider">
                <div id="carousel" class="carousel slide">
                    <!--Индикаторы слайдов-->
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carousel" data-slide-to="0"></li>
                        <li data-target="#carousel"  data-slide-to="1"></li>
                        <li data-target="#carousel"  data-slide-to="2"></li>
                    </ol>

                    <!--Слайды-->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="/public/i/slider/1.jpg" alt="">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <div class="item">
                            <img src="/public/i/slider/2.jpg" alt="">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <div class="item">
                            <img src="/public/i/slider/3.jpg" alt="">
                            <div class="carousel-caption">

                            </div>
                        </div>
                    </div>

                    <!--Стрелки переключения слайдов-->
                    <a href="#carousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#carousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-5 col-md-5 col-lg-5">
            <div id="zakaz">
                <div class="zakaz-top">
                    <p class="navbar-text"><i class="fa fa-cog fa-spin fa-lg"></i>  Запрос на запчасти</p>
                </div>
                <div class="zakaz-body">
                    <form action="/small" method="post">
                        <select id="s1" size="1" name="marka" onchange="Populate(this,'s2');">
                            <option value="select">Марка автомобиля</option>
                            <option value="Audi">Audi</option>
                            <option value="BMW">BMW</option>
                            <option value="Ford">Ford</option>
                            <option value="Honda">Honda</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Infiniti">Infiniti</option>
                            <option value="LandRover">Land Rover</option>
                            <option value="Lexus">Lexus</option>
                            <option value="Mazda">Mazda</option>
                            <option value="MercedesBenz">Mercedes-Benz</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Porsche">Porsche</option>
                            <option value="Subaru">Subaru</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Volkswagen">Volkswagen</option>
                        </select>
                        <select id="s2" size="1" name="model" onchange="Populate(this,'s3');">
                            <option value="select">Модель автомобиля</option>
                        </select>
                        <input type="text" name="vin" placeholder="№ кузова или VIN" required>
                        <input type="text" name="dvig" placeholder="№ двигателя" required>
                        <textarea type="text" name="zapchast" placeholder="Список запчастей" required></textarea>
                        <input type="text" name="name" placeholder="Имя" required>
                        <input type="text" name="city" placeholder="Город" required>
                        <input type="email" name="email" placeholder="E-mail" required>
                        <input type="text" name="phone" placeholder="Номер телефона" required>
                        <input class="btn btn-danger" type="submit" name="enter" value="Отправить запрос">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="operator">
                <img src="/public/i/telka-offline.png">
            </div>
            <div class="contact">
                <img src="/public/i/contacts.png" alt="Контакты">
            </div>

            <div id="punkt-vidachi">
                <div class="punkt-vidachi-top">
                    <p class="navbar-text"><i class="glyphicon glyphicon-home"></i>  Пункты выдачи</p>
                </div>
                <div class="punkt-vidachi-body">
                    <a href="#myModalNahodka" class="btn btn-lg btn-danger" data-toggle="modal"><i class="glyphicon glyphicon-download-alt"></i> Находка</a>

                    <div id="myModalNahodka" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Заголовок модального окна -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Пункты выдачи в Находке</h4>
                                </div>
                                <!-- Основной текст сообщения -->
                                <div class="modal-body">
                                    <img src="/public/i/boom.png" alt="Находка">
                                    <p>ул.Малиновского, 32 (Китайская стена, павильон № 10)</p>
                                    <p>Режим работы:</p>
                                    <p>с 9:00 до 18:00</p>
                                    <p>Без выходных</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#habarovsk" class="btn btn-lg btn-danger" data-toggle="modal"><i class="glyphicon glyphicon-download-alt"></i> Хабаровск</a>

                    <div id="habarovsk" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Заголовок модального окна -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Пункты выдачи в Хабаровске</h4>
                                </div>
                                <!-- Основной текст сообщения -->
                                <div class="modal-body">
                                    <img src="/public/i/habarovsk.jpg" alt="Хабаровск">
                                    <p>ул. Советская 3 , оф 203 (центр города)</p>
                                    <p>Режим работы:</p>
                                    <p>Пн - Пят с 10 до 19</p>
                                    <p>Суббота с 10 до 18</p>
                                    <p>Воскресенье выходной</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#arsenev" class="btn btn-lg btn-danger" data-toggle="modal"><i class="glyphicon glyphicon-download-alt"></i> Арсеньев</a>

                    <div id="arsenev" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Заголовок модального окна -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Пункты выдачи в Арсеньеве</h4>
                                </div>
                                <!-- Основной текст сообщения -->
                                <div class="modal-body">
                                    <img src="/public/i/arsenev.jpg" alt="Хабаровск">
                                    <img src="/public/i/mapa.jpg" alt="Карта проезда">
                                    <p>ул. Кирзоводская 3</p>
                                    <p>Режим работы:</p>
                                    <p>с 9:00 до 20:00</p>
                                    <p>Без выходных</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div id="comment">
                <div class="comment-top">
                    <p class="navbar-text"><i class="glyphicon glyphicon-bullhorn"></i>  Отзывы клиентов</p>
                </div>
                <div class="comment-body">
                    <form class="comment-post" action="/" method="post">
                        <input type="text" name="name" placeholder="Имя" required>
                        <input type="text" name="city" placeholder="Город" required>
                        <textarea type="text" name="message" placeholder="Отзыв"></textarea>
                        <input class="btn btn-danger" type="submit" name="post" value="Оставить отзыв">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div id="comment">
                <div class="comment-top">
                    <p class="navbar-text"><i class="glyphicon glyphicon-bookmark"></i>  Список отзывов</p>
                </div>
                <div class="comment-body">
                    <div class="comment-msg">


                        <div class="msg">

                            <b>jfcxlkkaiq, (Владимир)</b>
                            <p>Здравствуйте! <br>
                                Помощь в получении гражданам и сотрудникам организаций карт клиента metro в сеть немецких гипермаркетов Metro CASH and CARRY.  сайт: metro-ccc.ru <br>
                                Законно по юридическому договору оформим на частных лиц и сотрудников организаций к</p>
                            <span>2015-11-15 14:25:30</span>

                        </div>

                        <div class="msg">

                            <b>Александр, (Омск)</b>
                            <p>Мне очень понравилось сотрудничать с этой компанией, запчасти все пришли вовремя, проверив их целостность, я пришел в удивление. Спасибо огромное .</p>
                            <span>2015-07-27 20:36:41</span>

                        </div>

                        <div class="msg">

                            <b>Валерий, (Находка)</b>
                            <p>Спасибо большое вашей компании. Получил товар, уже поставили. Очень доволен, буду рад дальнейшему сотрудничеству.</p>
                            <span>2015-07-27 17:20:07</span>

                        </div>

                        <div class="msg">

                            <b>Дмитрий, (Омск)</b>
                            <p>Запчасти пришли вовремя!</p>
                            <span>2015-07-19 00:23:16</span>

                        </div>

                        <div class="msg">

                            <b>Максим, (Москва)</b>
                            <p>Профессионально и качественно выполнена работа,остался доволен!рекомендую!проверенно.</p>
                            <span>2015-07-17 16:17:53</span>

                        </div>

                        <div class="msg">

                            <b>Константин, (Хабаровск)</b>
                            <p>Отлично. Все запчасти получил. Спасибо, очень помогли.</p>
                            <span>2015-07-16 09:40:28</span>

                        </div>

                        <div class="msg">

                            <b>Евгений, (Омск)</b>
                            <p>Огромное спасибо за вашу работу. Все получил. Очень быстрый сервис.</p>
                            <span>2015-07-13 19:12:40</span>

                        </div>

                        <div class="msg">

                            <b>Валера, (Уссурийск)</b>
                            <p>Все запчасти получил. Все пришло в целости и сохранности. Я очень доволен.</p>
                            <span>2015-07-13 15:03:48</span>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>