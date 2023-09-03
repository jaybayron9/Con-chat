<?php view('partials/header') ?>

<div class="content">
    <div class="text">
        Register
    </div>
    <div id="error-msg"></div>
    <form id="register-form"> 
        <div class="field">
            <input type="text" name="username" />
            <span class="fas fa-user"></span>
            <label>Username</label>
        </div>
        <div class="field">
            <input type="password" name="password" />
            <span class="fas fa-lock"></span>
            <label>Password</label>
        </div> 
        <button>Sign up</button>
        <div class="log-button">
            Already a member?
            <a href="/">login now</a>
        </div>
    </form>
</div>

<?php view('partials/footer') ?>