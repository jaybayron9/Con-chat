<?php view('partials/header') ?>

<div class="content">
    <div class="text">
        Login
    </div>
    <div id="error-msg"> </div>
    <form id="login-form">
        <div class="field">
            <input type="text" name="username" placeholder="Username" />
            <span class="fas fa-user"></span>
            <label>Username</label>
        </div>
        <div class="field">
            <input type="password" name="password" placeholder="*********" />
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