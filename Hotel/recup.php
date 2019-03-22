<?php
                                                           
                                        require_once('connexion.php');
$t = $_POST['heb'];

                                        $ps = $pdo->prepare("SELECT nr_chambre FROM chambre where etat='libre' and code_categorie='$t'");
                                        $ps->execute();      
                                        while($row=$ps->fetch(PDO::FETCH_ASSOC))
                                     { extract($row); 
                                      echo $row['nr_chambre'].',';
                                     }