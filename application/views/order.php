<div class="wrapper">
    <div class="">
        <div class="form-container-1">
            <div class="form-container-2">
                <div class="form-container-3">
                    <h1 style="text-align:center;">Заказ запчастей</h1>
                    <div class="re_spec_wrap">
                        <div class="re_spec_wrap">
                            <div class="re_spec_desc">
                                <form class="order-form" method="post">
                                    <p class="order-form-s1">
                                        <label for="s1">Марка автомобиля</label><br />
                                        <select id="s1" name="brand" onchange="Populate(this,'s2');">
                                            <option value="select">Не выбрано</option>
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
                                    </p>
                                    <p class="order-form-s2">
                                        <label for="s2">Модель автомобиля</label><br />
                                        <select id="s2" name="model">
                                            <option value="select">Не выбрано</option>
                                        </select>
                                    </p>
                                    <p class="order-form-vin">
                                        <label for="vin">№ кузова или VIN</label><br />
                                        <input id="vin" name="vin" type="text" required />
                                    </p>
                                    <p class="order-form-engine">
                                        <label for="engine">№ двигателя</label><br />
                                        <input id="engine" name="engine" type="text" required />
                                    </p>
                                    <p class="order-form-part">
                                        <label for="part">Список запчастей</label><br />
                                        <textarea id="part" name="part" required  rows="2"></textarea>
                                    </p>
                                    <p class="comment-form-name">
                                        <label for="name">Имя</label><br>
                                        <input id="name" name="name" type="text" required>
                                    </p>
                                    <p class="comment-form-address">
                                        <label for="address">Город</label><br />
                                        <input id="address" name="address" type="text" required />
                                    </p>
                                    <p class="comment-form-email">
                                        <label for="email">E-mail</label><br>
                                        <input id="email" name="email" type="text" required>
                                    </p>
                                    <p class="comment-form-tel">
                                        <label for="tel">Телефон</label><br>
                                        <input id="tel" name="phone" type="text" required>
                                    </p>
                                    <p class="comment-form-tk">
                                        <label for="tk">Укажите транспортную компанию, если есть предпочтения</label><br>
                                        <input id="tk" name="tk" type="text" required>
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" id="order-submit"  name="neworder" value="Отправить запрос" />
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-page-description">
                <p>Запрос на запчасти осуществляется с помощью формы.</p>
                <p>1. Заполните форму</p>
                <p>2. При заполнение формы обязательно укажите номер кузова или VIN номер, посмотреть их можно в СРТС (Свидетельство о регистрации транспортного средства), либо в ПТС (Паспорт транспортного средства). В полях VIN номер, шасси или № кузова. Для более быстрого поиска рекомендуется вписывать полный номер. Смотрите фото:</p>
                <p><img src="/public/i/srts.png" alt="СРТС"></p>
                <p>3. Список запчастей перечислите через запятую, для более быстрого поиска запчастей, указывайте корректные названия.</p>
                <p>4. Данные получателя (Имя, город, E-mail, номер), тоже внимательно проверьте перед отправкой, чтобы менеджер нашей компании мог без затруднений с вами связаться.</p>
                <p>После того, как Вы заполнили форму и вписали все запчасти которые вас интересуют, нажмите кнопку "ОТПРАВИТЬ ЗАПРОС".</p>
                <p>После рассмотерния вашей заявки менеджером компании, вы получите ответ по одному из контактов указанных в форме. Запчасти высылаются с ценами и фотографиями на почту, также указанную в форме.</p>
        </div>
    </div>
</div>
<div class="push"></div>
<div id="viewSuccess">
    <a class="button bClose" href="#"><span>X</span></a>
    <!-- Основной текст сообщения -->
    <div class="success">Заказ успешно отправлен!</div>
</div>
<?if ($viewSuccess) {?>
    <script>
        jQuery(document).ready(function() {
            jQuery("#viewSuccess").bPopup();
        });
    </script>
<?}?>