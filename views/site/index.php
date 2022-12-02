<?php
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <p id="counter">Счетчик обновится в ближайшие 3 секунды</p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
foreach ($problems as $problem){
    echo '
        <div class="col-lg-3">
                <h2>'.$problem->name.'</h2>

                <p>'.$problem->description.'</p>
                <img alt="width="200" height="200" class="img-responsive" src="uploads/'.$problem->photoAfter.'"
                data-before="uploads/'.$problem->photoBefore.'" data-ather="uploads/'.$problem->photoAfter.'"
                onMouseOver="hover(this)" onMouseOut="back(this)">

                
            </div>';
                                }
            ?>
        </div>

    </div>
</div>

<script>
    var i = 0;
    function hover(el){
        el.src = el.dataset.before;
    }
    function back(el){
        el.src = el.dataset.ather;
    }

    function updateCounter(){
        $.ajax({
            type: 'GET',
            url: '<?= Url::toRoute('/site/counter') ?>',
            dataType: 'text',
            success: function (response){
            $('#counter').html('Решено заявок: ' + response);
            }
        });
            }
    setInterval(updateCounter, 3000);
</script>
