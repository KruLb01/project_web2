<div class="header-container">
    <div class="header-func">
        <img src="./static/img/logo/logo-ngang-trans.png" alt="">
        <span>Home</span>
        <span>Products</span>
        <span>About</span>
        <span>Contact</span>
        <input type="text" placeholder='Search..'>
        <i class="fas fa-search"></i>
    </div>

    <div class="header-user">
        <?php
            if (isset($_SESSION['customer']))  {
                echo '<span id="view-btn">
                        <i class="fas fa-user"></i>
                        '.$_SESSION['customer']['ho_ten'].'
                    </span>
                    <div class="header-user-view">
                        <div class="header-user-view-main">
                            <span><i class="fas fa-user"></i> '.$_SESSION['customer']['ho_ten'].'</span>
                            <span>View information</span>
                        </div>
                        <span>Change password</span>
                        <span>Settings</span>
                        <span>Log out</span>
            </div>';
            } else {
                echo '<span id="login-btn">
                <i class="fas fa-user"></i>
                Log in
            </span>';
            }
        ?>
        <span>
            <i class="fas fa-shopping-cart"></i>
            Cart
        </span>
    </div>
</div>

<script>
    $('#login-btn').click(function() {
        location.href = 'templates/Login.php';
    })
    $('#view-btn').click(function() {
        status = $('.header-user-view').eq(0).css('display');
        if (status == 'none') {
            $('.header-user-view').eq(0).css('display','flex');
        } else {
            $('.header-user-view').eq(0).css('display','none');
        }
    })
    $('.header-user-view-main').eq(0).click(function() {
        location.href = 'templates/view-info-cus.php';
    })
</script>