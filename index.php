<?php
echo"<html>
    <head>
    <title>Login Form</title>
    <div>
        FileAuth <b> username:</b> Chuck  <b>password: </b>Norris<br>
        MemAuth  <b> username:</b> memauth <b>password:</b> 123456
    </div>
    </head>
    
    <div align=center>
        Login<br>
        <p id='timeStamp'></p>

        <script>
        document.getElementById('timeStamp').innerHTML = Date();
        </script>
    </div>

    <div align=center>
        <form id='loginInfo' name='loginInfo' method='post' action='Login.php'>
                <table width='510' border='0' align='center'>
                    <tr>
                        <td align='right'>Username:</td>
                            <td><input type='text' name='username' id='username' />
                        </td>
                    </tr>
                    <tr>
                        <td align='right'>Password</td>
                        <td><input type='password' name='password' id='password' />
						</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        
						<td>
                            <input type='submit' name='loginButton' id='loginButton' value='Login' />
							<input type='radio' name='authType' value='File' checked>File
							<input type='radio' name='authType' value='Mem'>Mem
						</td>
                    </tr>
                </table>
        </form>
    </div>
</html>";