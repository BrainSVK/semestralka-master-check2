<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    /** @var TYPE_NAME $conn */
    $result = mysqli_query($conn, "SELECT * FROM gm_player WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $result2 = mysqli_query($conn,"SELECT * FROM gm_postava WHERE gm_postava.id = (SELECT id_postavy FROM gm_player WHERE id = $id)");
    $row2 = mysqli_fetch_assoc($result2);
} else {
    header("Location: login.php");
}
if (isset($_POST['zvysFyzUtok'])) {
    if ($row2["volneStaty"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET fyzickaSila = fyzickaSila + 1 , volneStaty = volneStaty - 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['znizFyzUtok'])) {
    if ($row2["fyzickaSila"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET fyzickaSila = fyzickaSila - 1 , volneStaty = volneStaty + 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['zvysMagUtok'])) {
    if ($row2["volneStaty"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET magickaSila = magickaSila + 1 , volneStaty = volneStaty - 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['znizMagUtok'])) {
    if ($row2["fyzickaSila"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET magickaSila = magickaSila - 1 , volneStaty = volneStaty + 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['zvysVieru'])) {
    if ($row2["volneStaty"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET viera = viera + 1 , volneStaty = volneStaty - 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['znizVieru'])) {
    if ($row2["fyzickaSila"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET viera = viera - 1 , volneStaty = volneStaty + 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['zvysStamina'])) {
    if ($row2["volneStaty"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET stamina = stamina + 1 , volneStaty = volneStaty - 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['znizStamina'])) {
    if ($row2["fyzickaSila"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET stamina = stamina - 1 , volneStaty = volneStaty + 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['zvysVitalita'])) {
    if ($row2["volneStaty"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET vitalita = vitalita + 1 , volneStaty = volneStaty - 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['znizVitalita'])) {
    if ($row2["fyzickaSila"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET vitalita = vitalita - 1 , volneStaty = volneStaty + 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['zvysStastie'])) {
    if ($row2["volneStaty"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET stastie = stastie + 1 , volneStaty = volneStaty - 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}
if (isset($_POST['znizStastie'])) {
    if ($row2["fyzickaSila"] > 0) {
        mysqli_query($conn, "UPDATE gm_postava SET stastie = stastie - 1 , volneStaty = volneStaty + 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
        header("Location: index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <ul class="navigation">
            <li>
                <h1>Schopnosti</h1>
                <a href="schopnosti.php"><img src="img/schopnosti.png" alt="schopnosti obrazok"></a>
            </li>
            <li>
                <h1>Postava</h1>
                <a href="index.php"><img src="img/postava.png" alt="postava obrazok"></a>
            </li>
            <li>
                <h1>Adventura</h1>
                <a href="adventura.php"><img src="img/mapa.png" alt="adventura obrazok"></a>
            </li>
        </ul>
    </header>
    <div id="stredny">
        <div id="priehladny"></div>
        <div class="skryteOkno posSkry"></div>
        <div class="obrazok"></div>
        <div class="statySchopnosti">
            <h1>SCHOPNOSTI</h1>
            <div class="pouzivaneSchopnosti">
                <?php
                if ($row2['id_fyz'] == 1) {
                    ?>
                    <img src="img/FlyingKick60.png" alt="schopnost flyingkick" style="min-width: 60px">
                    <?php
                } elseif ($row2['id_fyz'] == 2) {
                    ?>
                    <img src="img/BodySlam60.png" alt="schopnost bodyslam" style="min-width: 60px">
                    <?php
                } else {
                    ?>
                    <img src="img/PunchGataling60.png" alt="schopnost punchinggataling" style="min-width: 60px">
                    <?php
                }
                ?>

                <?php
                if ($row2['id_mag'] == 1) {
                    ?>
                    <img src="img/fireBall60.png" alt="schopnost fireball" style="min-width: 60px">
                    <?php
                } elseif ($row2['id_mag'] == 2) {
                    ?>
                    <img src="img/frostNova60.png" alt="schopnost frostnova" style="min-width: 60px">
                    <?php
                } else {
                    ?>
                    <img src="img/windSlash60.png" alt="schopnost windslash" style="min-width: 60px">
                    <?php
                }
                ?>

                <?php
                if ($row2['id_vie'] == 1) {
                    ?>
                    <img src="img/heal60.png" alt="schopnost heal" style="min-width: 60px">
                    <?php
                } elseif ($row2['id_vie'] == 2) {
                    ?>
                    <img src="img/defBonus60.png" alt="schopnost defbonus" style="min-width: 60px">
                    <?php
                } else {
                    ?>
                    <img src="img/AttakeBonus60.png" alt="schopnost attakebonus" style="min-width: 60px">
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="statySchopnosti">
            <h1>SCHOPNOSTI</h1>
            <div class="pouzivaneSchopnosti"></div>
        </div>
        <div class="statyAktual">
            <div class="volne">
                <h1>Po??et vo??n??ch statov je
                    <p>
                        <?php
                        echo $row2["volneStaty"];
                        ?>
                    </p>
                </h1>
            </div>
            <h1>Aktu??lne staty</h1>
            <div class="statyAktualRozOkno">
                <h1>Stav fyzickej sily je
                    <p>
                        <?php
                        echo $row2["fyzickaSila"];
                        ?>
                    </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav magickej sily je
                    <p>
                        <?php
                        echo  $row2["magickaSila"];
                        ?>
                    </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav viery je
                    <p>
                        <?php
                        echo  $row2["viera"];
                        ?>
                    </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav staminy je
                    <p>
                        <?php
                        echo  $row2["stamina"];
                        ?>
                    </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav vitality je
                    <p>
                        <?php
                        echo $row2["vitalita"];
                        ?>
                    </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav ????astia je
                    <p>
                        <?php
                        echo  $row2["stastie"];
                        ?>
                    </p>
                </h1>
            </div>
        </div>
        <div class="statyHlava">
            <h1>Vylep??i?? staty</h1>
            <div class="staty">
                <div class="statOkno sila">
                    <div class="skryteOkno posSkry">
                        <p>Fyzick?? sila je atrib??t ??to??nej sily postavy sp??soben?? fyzick??mi ??tokmi</p>
                    </div>
                    <h1>Fyzick?? sila</h1>
                    <form method="post">
                        <input type="submit" name="zvysFyzUtok" value="+" class="tlacitkoP tPriehladne">
                        <input type="submit" name="znizFyzUtok" value="-" class="tlacitkoL tPriehladne">
                    </form>
<!--                    <button onclick="" class="tlacitkoP fyzUtoku tPriehladne">+</button>-->
<!--                    <button class="tlacitkoL fyzUtoku tPriehladne">-</button>-->
                </div>
                <div class="statOkno magia">
                    <div class="skryteOkno posSkry">
                        <p>Magick?? sila je atrib??t ??to??nej sily postavy sp??soben?? magick??mi ??tokmi</p>
                    </div>
                    <h1>Magick?? sila</h1>
                    <form method="post">
                        <input type="submit" name="zvysMagUtok" value="+" class="tlacitkoP tPriehladne">
                        <input type="submit" name="znizMagUtok" value="-" class="tlacitkoL tPriehladne">
                    </form>
<!--                    <button class="tlacitkoP magUtoku tPriehladne">+</button>-->
<!--                    <button class="tlacitkoL magUtoku tPriehladne">-</button>-->
                </div>
                <div class="statOkno vie">
                    <div class="skryteOkno posSkry">
                        <p>Viera je atrib??t ??to??nej a lie??ivej sili postavy sp??soben?? modlitbami</p>
                    </div>
                    <h1>Viera</h1>
                    <form method="post">
                        <input type="submit" name="zvysVieru" value="+" class="tlacitkoP tPriehladne">
                        <input type="submit" name="znizVieru" value="-" class="tlacitkoL tPriehladne">
                    </form>
<!--                    <button class="tlacitkoP viera tPriehladne">+</button>-->
<!--                    <button class="tlacitkoL viera tPriehladne">-</button>-->
                </div>
                <div class="statOkno stam">
                    <div class="skryteOkno posSkry">
                        <p>Stam??na je atrib??t postavy v??dr??e a odolnosti vo??i magick??m ??tokom</p>
                    </div>
                    <h1>Stamina</h1>
                    <form method="post">
                        <input type="submit" name="zvysStamina" value="+" class="tlacitkoP tPriehladne">
                        <input type="submit" name="znizStamina" value="-" class="tlacitkoL tPriehladne">
                    </form>
<!--                    <button class="tlacitkoP stamina tPriehladne">+</button>-->
<!--                    <button class="tlacitkoL stamina tPriehladne">-</button>-->
                </div>
                <div class="statOkno vit">
                    <div class="skryteOkno posSkry">
                        <p>Vitalita je atrib??t postavy ??ivota a odolnosti vo??i fyzick??m ??tokom</p>
                    </div>
                    <h1>Vitalita</h1>
                    <form method="post">
                        <input type="submit" name="zvysVitalita" value="+" class="tlacitkoP tPriehladne">
                        <input type="submit" name="znizVitalita" value="-" class="tlacitkoL tPriehladne">
                    </form>
<!--                    <button class="tlacitkoP vitalita tPriehladne">+</button>-->
<!--                    <button class="tlacitkoL vitalita tPriehladne">-</button>-->
                </div>
                <div class="statOkno sta">
                    <div class="skryteOkno posSkry">
                        <p>??tastie je atrib??t postavy percentu??lnej ??ance kritick??ho ??deru</p>
                    </div>
                    <h1>????astie</h1>
                    <form method="post">
                        <input type="submit" name="zvysStastie" value="+" class="tlacitkoP tPriehladne">
                        <input type="submit" name="znizStastie" value="-" class="tlacitkoL tPriehladne">
                    </form>
<!--                    <button class="tlacitkoP stastie tPriehladne">+</button>-->
<!--                    <button class="tlacitkoL stastie tPriehladne">-</button>-->
                </div>
            </div>
        </div>
    </div>
    <form class="" action="" method="post">
        <div class="odhlasit"><a href="logout.php">Odhl??si??</a></div>
    </form>
    <form class="" action="" method="post">
        <div class="vymaza??Profil"><a href="vymaz.php">Vymaza?? u??ivate??a</a></div>
    </form>
</body>
</html>