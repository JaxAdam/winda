<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Регистрация</h2>
        </div>
        <div class="row clearfix">
            <div class="">
                <form action="/signup" method="post">
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="Email" required/>
                    </div>
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Пароль" required/>
                    </div>
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password2" placeholder="Повторите Пароль" required/>
                    </div>
                    <div class="row clearfix">
                        <div class="col_half">
                            <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                                <input type="text" name="name" placeholder="Имя" required/>
                            </div>
                        </div>
                        <div class="col_half">
                            <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                                <input type="text" name="surname" placeholder="Фамилия" required/>
                            </div>
                        </div>
                    </div>

                    <div class="input_field checkbox_option">
                        <input type="checkbox" name="access" id="cb1" required>
                        <label for="cb1">Принимаю условия конфидициальности</label>
                    </div>

                    <input class="button" type="submit" value="Регистрация"/>
                </form>
            </div>
        </div>
    </div>
</div>