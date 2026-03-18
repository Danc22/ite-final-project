<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="Authors" content="Daniel Clarke">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="theme" rel="stylesheet" href="style\formpages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="./images/logo_transparent.png" type="image/x-icon">
    <style>
        p {
            margin: 0 0 0 0;
        }
        [type='submit']{
            margin-right:0;
        }
    </style>
    <script src="./scripts/jquery-3.7.1.js"></script>
    <title>islandMovers</title>
</head>

<body>
    <div id="main">
        <div id="mainTextBox">
            <h1><span>islandMovers</span></h1>

            <form action="./selector.php" method="post">

                <p id="regionSelect" onmouseover="functLocation('Carib')" onmouseout="reset()">Caribbean
                    <input type="submit" id="regionSelect" class="carib" name="loc" style="display: none;" value="Barbados" />
                    <input type="submit" id="regionSelect" class="carib" name="loc" style="display: none;" value="Dominica" />
                    <input type="submit" id="regionSelect" class="carib" name="loc" style="display: none;" value="St Vincent" />
                </p>

                <p id="regionSelect" onmouseover="functLocation('USA')" onmouseout="reset()">United States
                    <input type="submit" id="regionSelect" class="usa" name="loc" style="display: none" value="Florida" />
                </p>
                <p id="regionSelect" onmouseover="functLocation('Mid')" onmouseout="reset()">Middle East
                    <input type="submit" id="regionSelect" class="mid" name="loc" style="display:none;" valie="Dubai" />
                    <input type="submit" id="regionSelect" class="mid" name="loc" style="display:none;" valie="Lebanon" />
                </p>

            </form>
        </div>
        <script>
            function reset() {
                document.getElementsByTagName('p')[0].removeAttribute('class');
                document.getElementsByTagName('p')[1].removeAttribute('class');
                document.getElementsByTagName('p')[2].removeAttribute('class');
                $(".carib").css("display", "none");
                $(".usa").css("display", "none");
                $(".mid").css("display", "none");
            }

            function functLocation(loc) {
                switch (loc) {
                    case 'Carib':
                        $(".carib").css("display", "flex");
                        document.getElementsByTagName('p')[1].removeAttribute('class');
                        document.getElementsByTagName('p')[2].removeAttribute('class');
                        $(".usa").css("display", "none");
                        $(".mid").css("display", "none");
                        $("#chkCarib").click();
                        break
                    case 'USA':
                        $(".usa").removeAttr("style");
                        document.getElementsByTagName('p')[1].classList.add('regionSelect_hover')
                        document.getElementsByTagName('p')[0].removeAttribute('class');
                        document.getElementsByTagName('p')[2].removeAttribute('class');
                        $(".carib").css("display", "none");
                        $(".mid").css("display", "none");
                        break;
                    case 'Mid':
                        $(".mid").removeAttr("style");
                        document.getElementsByTagName('p')[2].classList.add('regionSelect_hover')
                        document.getElementsByTagName('p')[1].removeAttribute('class');
                        document.getElementsByTagName('p')[0].removeAttribute('class');
                        $(".usa").css("display", "none");
                        $("#carib").css("display", "none");
                        break;
                }
                return;
            }
        </script>
    </div>

</body>

</html>