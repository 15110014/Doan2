<?php
    include './header.php';
?>
    <div class="jumbotron text-center" style="height: 110px; padding: 25px 25px;">
        <h1>Clip vui vui</h1>
    </div>
    <div style="text-align: center;">
        <?php
            echo "<div>";
            echo "<embed src='video.mp4' width='960' height='515'></embed>";
            echo "</div>";
        ?>
    </div>
    
<?php
    include './footer.php';
?>