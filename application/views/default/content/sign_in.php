<br><br>
<section class="section">
    <div class="row">
        <div class="col s1"></div>
        <div class="col s10">
            <div class="row">
                <div class="col s12">
                    <?php if ($this->session->flashdata('validation_errors') == 'true'): ?>
                    <div class="card-panel red">
                        <?php echo $this->session->userdata('validation_errors_msg'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error_message') != ''): ?>
                    <div class="card-panel red">
                        <span class="white-text"><?= $this->session->flashdata('error_message') ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s6"><a href="#register">Register</a></li>
                        <li class="tab col s6"><a class="active" href="#login">Login</a></li>
                    </ul>
                </div>
                <div class="col s12">
                    <div id="login" class="col s12">
                        <form method="POST" action="<?= base_url('login') ?>">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="ud_email" name="ud_email" type="text" required>
                                    <label for="ud_email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="ud_password" name="ud_password" type="password" required>
                                    <label for="ud_password">Password</label>
                                </div>
                            </div>
                            <p>
                                <label>
                                    <input type="checkbox" class="filled-in" name="remember_me" value="yes">
                                    <span>Remember Me</span>
                                </label>
                            </p>
                            <div class="row">
                                <button class="btn waves-effect waves-light" type="submit" name="login" value="login">Login</button>
                            </div>
                        </form>
                    </div>
                    <div id="register" class="col s12">
                        <form method="POST" action="<?= base_url('sign_up') ?>">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="ud_name" name="ud_name" type="text" required>
                                    <label for="ud_name">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="ud_email" name="ud_email" type="text" required>
                                    <label for="ud_email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="ud_password" name="ud_password" type="password" required>
                                    <label for="ud_password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="ud_repassword" name="ud_repassword" type="password" required>
                                    <label for="ud_repassword">Confirmation Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn waves-effect waves-light" type="submit" name="sign_up" value="sign_up">Sign
                                    Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s1"></div>
    </div>
</section>
