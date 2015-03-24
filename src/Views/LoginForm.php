<?php

namespace Views;


class LoginForm extends View
{
    public function __construct()
    {
        $this->content = <<<LOGIN_FORM
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example Login Form</title>
        FileAuth <b> username:</b> Chuck  <b>password: </b>Norris<br>
        MemAuth  <b> username:</b> memauth <b>password:</b> 123456<br>
        MySQLAuth  <b>PDO call: </b>'mysql:host=localhost;dbname=test','root','1234'<br>
        SQLiteAuth  <b> username:</b> SQLite <b>password:</b> Litepass<br>
    </head>
    <body>
        <div align="center">
            <form method="POST" action="/auth">
                Username: <input type="text" name="username" size="15" /><br />
                Password: <input type="password" name="password" size="15" /><br />
                <p><input type="submit" value="Login" /></p>
                    <input type='radio' name='authType' value='File' checked>File
                    <input type='radio' name='authType' value='Mem'>Mem
                    <input type='radio' name='authType' value='MySQL'>MySQL
                    <input type='radio' name='authType' value='SQLite'>SQLite
            </form>
        </div>
    </body>
</html>
LOGIN_FORM;
    }
}
