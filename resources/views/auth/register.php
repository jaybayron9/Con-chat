<?php view('partials/header') ?>

<div class="content">
    <div class="text">
        Register
    </div>
    <form action="#">
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
        <button>Sign up</button>
        <div class="log-button">
            Already a member?
            <a href="/">login now</a>
        </div>
    </form>
</div>

<?php view('partials/header') ?>