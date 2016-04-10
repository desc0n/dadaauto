<!DOCTYPE html>
<html dir="ltr" lang="ru-RU" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Продажа контрактных и Новых автозапчастей на все иномарки.
                                    Продажа Автомобилей с Японии под полную пошлину, а так же Распил, Карпил, Подарок.
                                        Все товары Аукционов Японии Yahoo.
                                        Запчасти на спецтехнику, работаем с заводом изготовителем." />
    <meta name="keywords" content="Продажа автозапчастей, распилы с Японии, автомобили под заказ, поиск автозапчастей, для иномарок, запчасти на все, все запчасти на все авто только у нас, Автомобили из Японии, запчасти из Японии, Интренет - аукционы Yahoo" />
    <meta name="author" content="Компания DADAAUTO" />
    <title>Главная - DADAAUTO</title>
    <link href="/public/i/fav.png"  sizes="38x38" rel="shortcut icon" type="image/png" />

    <link rel="stylesheet" type="text/css" media="all" href="/public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="all" href="/public/css/style.css?v=3" />
    <link rel="stylesheet" type="text/css" media="all" href="/public/css/gtw.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="/public/js/popup.js"></script>
    <script type="text/javascript" src="/public/js/custom.js"></script>
    <script type="text/javascript" src="/public/js/bootstrap.js"></script>

    <script>
        if( /iPad|iPhone/i.test(navigator.userAgent) && (window.innerHeight < window.innerWidth))
            $('#viewport').attr('content','width=1200');
    </script>
</head>
<body>
<div class="page_elem_top">
    <div class="page_elem_menu">
        <a href="/" id="logo"></a>
        <div id="menu">
            <div class="menu-menu-container">
                <ul id="menu-menu" class="menu">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page <?=$page == 'index' ? 'current-menu-item' : '';?>"><a href="/">Главная</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page <?=$page == 'about' ? 'current-menu-item' : '';?>"><a href="/about">О нас</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page <?=$page == 'reviews' ? 'current-menu-item' : '';?>"><a href="/reviews">Отзывы</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page <?=$page == 'order' ? 'current-menu-item' : '';?>"><a href="/order">Заказ запчастей</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page <?=$page == 'pay' ? 'current-menu-item' : '';?>"><a href="/pay">Доставка и оплата</a></li>
                </ul>
            </div>
        </div>
        <div id="contacts">
            <div id="phone">
                <a href="#">+7 (964) 444 49 59</a>
            </div>
            <div id="mail">
                <a href="#">shop@dadaauto.ru</a>
            </div>
        </div>
    </div>
</div>
<?=$content;?>
<div class="footer">
    <div class="page_elem_footer">
        <div id="footer_menu">
            <div class="menu-footer-container"></div>
            <div class="menu-footer-container">
                <ul id="menu-footer" class="menu">
                    <li>
                        <a class="pseudo-link" href="#">Соцсети</a>
                        <ul class="sub-menu">
                            <li><noindex><a href="https://www.instagram.com/dadaauto.ru/" class="footer_insta" target="_blank"></a></noindex></li>
                            <li><noindex><a href="https://vk.com/dadaauto" class="footer_vk" target="_blank"></a></noindex></li>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu-footer-container"><br>
            </div>
        </div>
        <div class="copyrights">
            dadaauto.ru © 2015 Все права защищены<br/>
        </div>
    </div>
</div>
<script type="text/javascript" src="/public/js/scripts.js"></script>
<script>
    $(document).ready(function(){
        if ($(window).width() < 400) {
            document.location = 'http://m.dadaauto.ru';
        }
    });
</script>
</body>
</html>
