<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    /** @var TYPE_NAME $conn */
    $result = mysqli_query($conn, "SELECT *FROM gm_player WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $result2 = mysqli_query($conn,"SELECT * FROM gm_postava WHERE gm_postava.id = (SELECT id_postavy FROM gm_player WHERE id = $id)");
    $row2 = mysqli_fetch_assoc($result2);
} else {
    header("Location: login.php");
}

if (isset($_POST['flyingkick'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_fyz = 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
}
if (isset($_POST['bodyslam'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_fyz = 2 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
}
if (isset($_POST['punchgataling'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_fyz = 3 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
}
if (isset($_POST['fireball'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_mag = 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
}
if (isset($_POST['frostnova'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_mag = 2 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
}
if (isset($_POST['windslash'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_mag = 3 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
}
if (isset($_POST['heal'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_vie = 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
}
if (isset($_POST['defbonus'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_vie = 2 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
}
if (isset($_POST['attakebonus'])) {
    mysqli_query($conn, "UPDATE gm_postava SET id_vie = 3 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    header("Location: schopnosti.php");
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
        <div class="rozdelSchopnosti">
            <div class="schopnostiUtokov">
                <h1>Fyzisk?? schopnosti</h1>
                <div class="schopnostiUtokovRozOkno">
                    <li>
                        <div class="flying">
                            <form method="post">
                                <button type="submit" name="flyingkick" style="padding: 0; background: none ;border: none;"><img src="img/FlyingKick60.png" alt="flyingkick"/></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>FlyingKick je fyzick?? schopnos?? na vytvorenie
                                        <p2>kombin??cie ??tokov
                                            <div class="kick">
                                                <div class="skryteOkno2">
                                                    <p3>Kombin??cia ??tokov ti dovol?? pou??i?? ??al??iu schopnos??</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <div class="bod">
                            <form method="post">
                                <button type="submit" name="bodyslam" style="padding: 0; background: none ;border: none;"><img src="img/BodySlam60.png" alt="bodyslam"/></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>BodySlam je fyzisk?? schopnos?? pri ktorej hodom o zem
                                        <p2>omr????i?? protivn??ka
                                            <div class="slam">
                                                <div class="skryteOkno2">
                                                    <p3>Omr????enie nedovol?? u??ivate??ovi pou??i?? schopnos??</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <div class="gataling">
                            <form method="post">
                                <button type="submit" name="punchgataling" style="padding: 0; background: none ;border: none;"><img src="img/PunchGataling60.png" alt="punchgataling"/></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>PunchGataling je fyzick?? schopnos?? pri ktorej uzivatel
                                        <p2>vrh?? p??s??ami
                                            <div class="punch">
                                                 <div class="skryteOkno2">
                                                    <p3>Vrhana?? p??s??ami u??ivate?? bude dok??m bude triafa??</p3>
                                                </div>
                                            </div>
                                         </p2>
                                     </p1>
                                </div>
                            </form>
                        </div>
                    </li>
                </div>
                <h1>Magick?? schopnosti</h1>
                <div class="schopnostiUtokovRozOkno">
                    <li>
                        <div class="fire">
                            <form method="post">
                                <button type="submit" name="fireball" style="padding: 0; background: none ;border: none;"><img src="img/fireBall60.png" alt="fireball" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>FireBall je magick?? schopnos?? ohniv??ho atrib??tu
                                        <p2>sp??sobuje zap??lenie
                                            <div class="fir">
                                                <div class="skryteOkno2">
                                                    <p3>Zap??lenie po??kodzuje u??ivate??a dok??m hor??</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <div class="frost">
                            <form method="post">
                                <button type="submit" name="frostnova" style="padding: 0; background: none ;border: none;"><img src="img/frostNova60.png" alt="frostnova" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>FrostNova je magick?? schopnos?? ??adov??ho atrib??tu
                                        <p2>sp??sobuje umrznutie
                                            <div class="frot">
                                                <div class="skryteOkno2">
                                                <p3>Umrznutie po??kodzuje u??ivate??a dok??m mrzne</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <div class="wind">
                            <form method="post">
                                <button type="submit" name="windslash" style="padding: 0; background: none ;border: none;"><img src="img/windSlash60.png" alt="windslash" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>WindSlash je magick?? schopnos?? vetern??ho atrib??tu
                                        <p2>sp??sobuje krv??canie
                                            <div class="win">
                                                <div class="skryteOkno2">
                                                    <p3>Krv??canie po??kodzuje u??ivate??a dok??m krv??ca</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                            </form>
                        </div>
                    </li>
                </div>
                <h1>Schopnosti viery</h1>
                <div class="schopnostiUtokovRozOkno">
                    <li>
                        <div class="wind">
                            <form method="post">
                                <button type="submit" name="heal" style="padding: 0; background: none ;border: none;"><img src="img/heal60.png" alt="heal" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>Heal je schopnos?? viery pri ktorej sa u??ivate?? <br>
                                        <p2>vylie??i ??ivoty
                                            <div class="win">
                                                <div class="skryteOkno2">
                                                    <p3>Umo??n?? si obnovi?? body ??ivota</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <div class="bod">
                            <form method="post">
                                <button type="submit" name="defbonus" style="padding: 0; background: none ;border: none;"><img src="img/defBonus60.png" alt="defbonus" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>DefenceBonus je schopnos?? viery pri ktorej si u??ivate??
                                        <p2>zv????i odolnos??
                                            <div class="slam">
                                                <div class="skryteOkno2">
                                                    <p>Zv????i odolnos?? vo??i magick??m a fyzick??m ??tokom</p>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <div class="fire">
                            <form method="post">
                                <button type="submit" name="attakebonus" style="padding: 0; background: none ;border: none;"><img src="img/AttakeBonus60.png" alt="attakebonus" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>AttakeBonus je schopnos?? viery pri ktorej si u??ivate??
                                        <p2>zv????i silu
                                            <div class="fir">
                                                <div class="skryteOkno2">
                                                    <p3>Zv????i magick?? a fyzick?? ??tok u??ivate??a</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                            </form>
                        </div>
                    </li>
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