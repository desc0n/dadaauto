<div class="wrapper">
    <div class="main-elem">
        <a id="give_response" href="#"><input type="submit" id="give-response-submit" value="Оставить отзыв" /></a>
        <div class="review_wrap">
            <?
            $i = 1;
            foreach ($reviewsData as $review) {
                $ch = $i % 2;
                ?>
            <div class="review_single" <?=$ch == 1 ? 'style="margin-right:60px; clear:left;"' : '';?>>
                <div class="review_desc">
                    <h3><?=$review['author'];?></h3>
			        <span class="review_city">
			        <?=$review['city'];?>
                    </span>
                    <div class="review_quote">“</div>
                    <div class="review_quote_text">
                        <?=$review['content'];?>
                    </div>
                </div>
            </div>
                <?
                $i++;
            }
            ?>
        </div>
    </div>
    <div id="respond">
        <a class="button bClose" href="#"><span>X</span></a>
        <h2 style="text-align:center;">Оставить отзыв </h2>

        <div class="modal-body">
            <p class="comment-form-author">
                <label for="author">Имя</label><br />
                <input id="author" name="author" id="author" type="text" size="50" aria-required='true' />
            </p>
            <p class="comment-form-city">
                <label for="city">Город</label><br />
                <input id="city" name="city" id="city" type="text" size="50" aria-required='true' />
            </p>
            <p class="comment-form-comment">
                <label for="comment">Отзыв</label><br />
                <textarea id="comment" name="comment" id="comment" aria-required="true"  cols="50" rows="5"></textarea>
            </p>
            <p class="comment-notes">Ваш отзыв появится на сайте после проверки модератором. Спасибо!</p>
            <p class="form-submit">
                <input name="submit" type="submit" id="sendReview" value="Отправить отзыв" />
            </p>
        </div>
    </div>
    <script>
            $(function() {
                $('#give_response').bind('click', function(e) {
                    e.preventDefault();
                    $('#respond').bPopup();
                });
            });
    </script>
</div>
<div class="push"></div>