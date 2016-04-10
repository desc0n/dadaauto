<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div id="about">
                <div class="zakaz-top">
                    <p class="navbar-text"><i class="glyphicon glyphicon-cog"></i> Заказ запчастей</p>
                </div>
                <div class="zakaz-body">
                    <form action="/zakaz" method="post">
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
                        <label>Укажите транспортную компанию, если есть предпочтения</label>
                        <input type="text" name="ts" placeholder="Транспортная компания">
                        <input class="btn btn-danger" type="submit" name="enter" value="Отправить запрос">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div id="about">
                <div class="zakaz-top">
                    <p class="navbar-text"><i class="glyphicon glyphicon-book"></i> Информация к заказу запчастей</p>
                </div>
                <div class="zakaz-body">
                    <p>Запрос на запчасти осуществляется с помощью формы.</p>
                    <p>1. Заполните форму</p>
                    <p>2. При заполнение формы обязательно укажите номер кузова или VIN номер, посмотреть их можно в СРТС (Свидетельство о регистрации транспортного средства), либо в ПТС (Паспорт транспортного средства). В полях VIN номер, шасси или № кузова. Для более быстрого поиска рекомендуется вписывать полный номер. Смотрите фото:</p>

                    <a href="#myModalBox" class="btn btn-lg btn-danger" data-toggle="modal">Посмотреть фото СРТС</a>

                    <div id="myModalBox" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Заголовок модального окна -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Фотография (Свидетельства о регистрации транспортного средства)</h4>
                                </div>
                                <!-- Основной текст сообщения -->
                                <div class="modal-body">
                                    <img src="/public/i/srts.png" alt="СРТС">
                                </div>
                                <!-- Нижняя часть модального окна -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>3. Список запчастей перечислите через запятую, для более быстрого поиска запчастей, указывайте корректные названия.</p>
                    <p>4. Данные получателя (Имя, город, E-mail, номер), тоже внимательно проверьте перед отправкой, чтобы менеджер нашей компании мог без затруднений с вами связаться.</p>
                    <p>После того, как Вы заполнили форму и вписали все запчасти которые вас интересуют, нажмите кнопку "ОТПРАВИТЬ ЗАПРОС".</p>
                    <p>После рассмотерния вашей заявки менеджером компании, вы получите ответ по одному из контактов указанных в форме. Запчасти высылаются с ценами и фотографиями на почту, также указанную в форме.</p>
                </div>
            </div>
        </div>
    </div>
</div>