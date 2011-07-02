<?php
    session_start();

    $arraypage = array(
        "acc" => array(
            'file' =>"accueil",
            'label' => "Acceuil"
        ),

        "comp" => array(
            'file' => "competences",
            'label' => "Competences"
        ),

        "exp" => array(
            'file' => "experiences",
            'label' => "Exeperience"
        ),

        "form" => array(
            'file' => "formations",
            'label' => "Formations"
        ),

        "cont" => array(
            'file' => "contact",
            'label' => "Contact"
        ),

        "div" =>  array(
            'file'=> "divers",
            'label' => "Divers"
        )
    );

    $nopage = true;
    $defaultpage = "acc";

    if (isset($_GET['page'])){
        $pageactive = $_GET['page'];
    }

    if ($nopage && empty($pageactive)){
        $pageactive = $defaultpage;
        $nopage = false;
    }

    if ($nopage && !array_key_exists($pageactive, $arraypage)){
        $pageactive = $defaultpage;
        $nopage = false;
    }

    $page = $arraypage[$pageactive]['file'];
    if ($nopage && !file_exists("pages/$page.php")){
        $pageactive = $defaultpage;
        $page = $arraypage[$pageactive]['file'];
        $nopage = false;
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>CV Soumia ADJIR</title>
        <link rel="stylesheet" type="text/css" href="webCV.css" media="screen" />
    </head>
    <body>
       <!--<img src="images/arch_linux.png" id="background" alt="mon background" /> -->
        <div id="container">
            <div id="window">
                <div class="label"><?php echo $arraypage[$pageactive]["label"];  ?></div>
                <div class="body">
                    <?php include("pages/$page.php"); ?>
                </div>
            </div>

            <div id="taskbar" >
                <div class="level1 menugroup">
                    <div class="itemlevel1 item1">
                        <div class="label">Soumia ADJIR</div>
                        <div class="level2 menugroup">
                            <div class="itemlevel2 item1"><a href="index.php?page=comp" title="competences">Compétences</a></div>
                            <div class="itemlevel2 item2"><a href="index.php?page=exp"  title="experiences">Expériences</a></div>
                            <div class="itemlevel2 item3"><a href="index.php?page=form" title="formations">Formations</a></div>
                            <div class="itemlevel2 item4"><a href="index.php?page=div" title="divers">Divers</a></div>
                            <div class="itemlevel2 item5"><a href="index.php?page=acc" title="competences">Accueil</a></div>
                        </div>
                    </div>

                    <div class="itemlevel1 item2">
                        <div class="label">Téléchargement</div>
                        <div class="level2 menugroup">
                            <div class="itemlevel2 item1"><a href="#">cv format pdf</a></div>
                            <div class="itemlevel2 item2"><a href="#">cv format doc</a></div>
                        </div>
                    </div>

                    <div class="itemlevel1 item3">
                        <div class="label">Validation</div>
                        <div class="level2 menugroup">
                            <div class="itemlevel2 item1">
                                <a href="http://validator.w3.org/check?uri=referer">
                                    <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" />
                                </a>
                            </div>
                            <div class="itemlevel2 item2">
                                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                                    <img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS Valide !" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="itemlevel1 item4">
                        <div class="label">Horloge</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
