<?php view('partials/header') ?>

<div class="content">
    <div class="text">
        Login
    </div>
    <form action="/room" method="get">
        <div class="field">
            <input type="text" required>
            <span class="fas fa-user"></span>
            <label>Email or Phone</label>
        </div>
        <div class="field">
            <input type="password" required>
            <span class="fas fa-lock"></span>
            <label>Password</label>
        </div> 
        <button type="submit">Sign in</button>
        <div class="log-button">
            Not a member?
            <a href="/register">signup now</a>
        </div>
    </form>
</div>


<?php view('partials/footer') ?>