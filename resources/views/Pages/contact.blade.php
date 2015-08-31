<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            h2 {
                font-size: 60px;
                font-weight: normal;;
            }
            
            
            
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="content">
                <h2>Page de contact</h2>
                <form action="">
                    <label for="sujet">Sujet : <input type="text" name="sujet"></label><br>
                    <label for="email">Email : <input type="email" name="email"></label><br>
                    <label for="message">Message : <textarea name="message" id="message" cols="30" rows="10"></textarea></label><br>
                    <input type="submit">
                </form>
            </div>
        </div>
    </body>
</html>
