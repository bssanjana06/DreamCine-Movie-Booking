<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="site.css" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="parent-container">
        <table width="100%" height="100%">
            <tr>
                <td text-align="center" valign="middle">
                    <div class="loginholder">
                        <table style="background-color:white;" class="table-condensed">
                            <tr>
                                <td>
                                    <a href="./index.html"><img src="img/logo.png" alt="" width="180px"></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>User Name:</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="login.php" method="post">
                                        <input type="text" class="inputbox" name="username" /><br><p id="nameerror"></p>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Password:</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" class="inputbox" name="password" /><br><p id="passerror"></p><div id="msg"></div>
                                </td>
                            </tr>
                            <tr>
                                <td text-align="center"><br />
                                    <button type="submit" class="btn-normal" name="login">LOGIN</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td text-align="left"><br />
                                    <span class="forgetpassword"><a href="forget_password.php"> Forget your Password ?</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="register_form.php"> Register now</a></td>
                            </tr>
                            <tr>
                                <td><hr style="background-color:blue;height:1px;margin:0px;"/></td>
                            </tr>
                            <tr>
                                <td text-align="center"></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
