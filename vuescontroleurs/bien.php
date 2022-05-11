<!DOCTYPE html>
<html lang='fr'>

    <head>
        <meta charset="UTF-8">
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <title>LILLE IMMO</title>
    </head>
    <body>
        <a href="accueil.html"> <img class='logo' src="images/logosite.jpg" alt="Le logo su site"></a>
        <nav>

            <ul class="container">

                <li>
                    <a href="accueil.html">ACCUEIL </a>
                </li>

                <li class='dropdown'>
                    <a href='immobilier.html'>IMMOBILIER  <i class="fa fa-angle-down"></i></a>
                    <div class='menu'>
                        <div class="container">
                            <div class="item">
                                <ul>
                                    <li><a href='maisons.html'> > MAISONS</a></li>
                                    <li><a href='appartements.html'> > APPARTEMENTS</a></li>
                                    <li><a href='locaux.html'> > LOCAUX COMMERCIAUX</a></li>
                                    <li><a href='immeubles.html'> > IMMEUBLES</a></li>
                                    <li><a href='terrains.html'> > TERRAIN NUS</a></li>
                                </ul>
                            </div>      
                        </div>
                    </div>
                </li>


                <li>
                    <a href='contact.html'>CONTACT </a>
                </li>

                <li>
                    <a href='formulaireconnexion.html'>CONNEXION </a>
                </li>

            </ul>

        </nav>
        <div id="content">

            <a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>

            <!-- tester si l'utilisateur est connecté -->
            <?php
            session_start();
            if(isset($_GET['deconnexion']))
            { 
            if($_GET['deconnexion']==true)
            {  
            session_unset();
            header("location:login.php");
            }
            }
            else if($_SESSION['username'] !== ""){
            $user = $_SESSION['username'];
            // afficher un message
            echo "<br>Bonjour $username, vous êtes connectés";
            }
            ?>

        </div>

        <h2>Ajout, Modification, Suppression de bien</h2>

        <br><br>

        <h3>Pour ajouter :</h3>
        <br>
        <form method="post" action="ajout.php">

            <fieldset>

                <label for="typeBien">Quel type de bien voulez-vous ?</label><br />
                <select name="typeBien" id="typeBien">
                    <option value="maison" >Maison </option>
                    <option value="appartement">Appartement</option>
                    <option value="local">Local Commercial</option>
                    <option value="immeuble">Immeuble</option>
                    <option value="terrainNu">Terrain Nu</option>

                </select>

            </fieldset>

            <br>

            <fieldset>

                <label for="surface">Quel est la surface en m² ?</label>
                <input type="nombre" name="surface" id="surface" />
                <br><br>
                <label for="prix">Quel est le prix ?</label>
                <input type="nombre" name="prix" id="prix" />
                <br><br>
                <label for="ville">Quel est la ville ?</label>
                <input type="text" name="ville" id="ville" />

            </fieldset>

            <br>

            <fieldset>

                <label for="typeBien">Y'a-t-il un jardin ?</label><br />
                <select name="jardin" id="jardin">
                    <option value="Oui">Oui </option>
                    <option value="Non">Non</option>

                </select>

            </fieldset>

            <br>

            <fieldset>


                <label for="typeBien">Combien de pièces ?</label><br />
                <select name="piece" id="piece">
                    <option value="0">0 </option>
                    <option value="1">1 </option>
                    <option value="2">2</option>
                    <option value="3">3 </option>
                    <option value="4">4</option>
                    <option value="5">5 </option>
                    <option value="6">6</option>
                    <option value="7">7 </option>
                    <option value="8">8</option>
                    <option value="9">9 </option>
                    <option value="10">10</option>

                </select>

            </fieldset>

            <br>

            <input class="submit" type="submit" value="Ajouter"  />
            <br>
        </form>


        <br><br>

        <!-- --------------------------------------------------------------------------------------------------------> 

        <h3>Pour modifier :</h3>
        <br>
        <form method="post" action="modif.php">

            <fieldset>

                <label for="idBien">Saisir l'id du bien :</label>
                <input type="nombre" name="idBien" id="idBien" />
            </fieldset>
            <br>

            <fieldset>

                <label for="typeBien">Quel type de bien voulez-vous ?</label><br />
                <select name="typeBien" id="typeBien">
                    <option value="maison" >Maison </option>
                    <option value="appartement">Appartement</option>
                    <option value="local">Local Commercial</option>
                    <option value="immeuble">Immeuble</option>
                    <option value="terrainNu">Terrain Nu</option>

                </select>

            </fieldset>

            <br>

            <fieldset>


                <label for="surface">Quel est la surface en m² ?</label>
                <input type="nombre" name="surface" id="surface" />
                <br><br>
                <label for="prix">Quel est le prix ?</label>
                <input type="nombre" name="prix" id="prix" />
                <br><br>
                <label for="ville">Quel est la ville ?</label>
                <input type="text" name="ville" id="ville" />

            </fieldset>

            <br>

            <fieldset>


                <label for="typeBien">Y'a-t-il un jardin ?</label><br />
                <select name="jardin" id="jardin">
                    <option value="Oui">Oui </option>
                    <option value="Non">Non</option>

                </select>

            </fieldset>

            <br>

            <fieldset>


                <label for="typeBien">Combien de pièces ?</label><br />
                <select name="piece" id="piece">
                    <option value="0">0 </option>
                    <option value="1">1 </option>
                    <option value="2">2</option>
                    <option value="3">3 </option>
                    <option value="4">4</option>
                    <option value="5">5 </option>
                    <option value="6">6</option>
                    <option value="7">7 </option>
                    <option value="8">8</option>
                    <option value="9">9 </option>
                    <option value="10">10</option>

                </select>

            </fieldset>

            <br>

            <input class="submit" type="submit" value="Modifier"  />

        </form>


        <br><br>

        <!-- --------------------------------------------------------------------------------------------------------> 

        <h3>Pour supprimer :</h3>
        <br>
        <form method="post" action="supp.php">
            <fieldset>

                <label for="idBien">Saisir l'id du bien :</label>
                <input type="nombre" name="idBien" id="idBien" />
            </fieldset>
            <br>
            <input class="submit" type="submit" value="Supprimer"  />

        </form>
        <!-- --------------------------------------------------------------------------------------------------------> 
        <br><br>
        <br><br>

        <footer class="footer-distributed">

            <div class="footer-right">

                <a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/?lang=fr"><i class="fa fa-twitter"></i></a>
                <a href="https://fr.linkedin.com"><i class="fa fa-linkedin"></i></a>
                <a href="https://github.com/"><i class="fa fa-github"></i></a>

            </div>

            <div class="footer-left">

                <p class="footer-links">
                    <a class="link-1" href="accueil.html">Accueil</a>

                    <a href="immobilier.html">Immobilier</a>

                    <a href="contact.html">Contact</a>
                </p>

                <p>Lille Immo &copy; 2022</p>
            </div>

        </footer>
    </body>
</html>
