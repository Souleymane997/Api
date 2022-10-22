<?php
require('nodeQuery.php'); // fichier contenant les requettes sql
require('connect.php');

$execQuery = new QueryNodeJS(); // initialisation de la classe des requettes  "RDT563S45E4DF5G6YKOP451"


try {
    if (!empty($_GET['demande'])) {
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL)); 
        if ($url[0] == "RDT563S45E4DF5G6YKOP451") { // controle API KEY
            switch ($url[1]) {

                case "Eleve" :

                    switch ($url[2]) {

                        case "insertEleve":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertEleve($dblink, $_POST);
                            sendJSON($resp);
                            break;
        
                        case "getAllEleve":
                            if (isset($url[3])) {
                                $id1 = (int) $url[3] ;
                            }

                            if (isset($url[4])) {
                                $id2 = (int) $url[4] ;
                            }
                            
                            $resp = $execQuery->getAllEleve($dblink,$id1,$id2);
                            sendJSON($resp);
                            break;
                        
                            case "getCountEleve":
                                if (isset($url[3])) {
                                    $id1 = (int) $url[3] ;
                                }
    
                                if (isset($url[4])) {
                                    $id2 = (int) $url[4] ;
                                }
                                
                                $resp = $execQuery->getCountEleve($dblink,$id1,$id2);
                                sendJSON($resp);
                                break;
        
                        case "editEleve":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            $resp = $execQuery->editEleve($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteEleve":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteEleve($dblink,$id);
                            sendJSON($resp);
                            break;
                        
                        case "getLastEleve":
                            $resp = $execQuery->getLastEleve($dblink);
                            sendJSON($resp);
                            break;

                        case "insertLien":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertLien($dblink,$_POST);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;


                case "Enseignant" :

                    switch ($url[2]) {

                        case "insertEns":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertEns($dblink, $_POST);
                            sendJSON($resp);
                            break;
        
                        case "getAllEns":
                            
                            $resp = $execQuery->getAllEns($dblink);
                            sendJSON($resp);
                            break;
                        
                        case "getCountEleve":
                            if (isset($url[3])) {
                                $id1 = (int) $url[3] ;
                            }

                            if (isset($url[4])) {
                                $id2 = (int) $url[4] ;
                            }
                            
                            $resp = $execQuery->getCountEleve($dblink,$id1,$id2);
                            sendJSON($resp);
                            break;
        
                        case "editEleve":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            $resp = $execQuery->editEleve($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteEleve":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteEleve($dblink,$id);
                            sendJSON($resp);
                            break;
                        
                        case "getLastEleve":
                            $resp = $execQuery->getLastEleve($dblink);
                            sendJSON($resp);
                            break;

                        case "insertLien":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertLien($dblink,$_POST);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;



                case "Classe" :

                    switch ($url[2]) {

                        case "insertClasse" :
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            // $af = var_dump($_POST) ;
                            // echo "$af" ;
                            $resp = $execQuery->insertClasse($dblink, $_POST);
                            sendJSON($resp);
                            break;
        
                        case "getAllClasse" :
                            $resp = $execQuery->getAllClasse($dblink);
                            sendJSON($resp);
                            break;
        
                        case "editClasse":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            $resp = $execQuery->editClasse($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteClasse":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteClasse($dblink,$id);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;

                case "Matiere" :
                    

                    switch ($url[2]) {

                        case "insertMatiere" :
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertMatiere($dblink, $_POST);
                            sendJSON($resp);
                            break;
        
                        case "getMatiere" :
                            $resp = $execQuery->getMatiere($dblink);
                            sendJSON($resp);
                            break;
        
                        case "editMatiere":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            $resp = $execQuery->editMatiere($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteMatiere":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteMatiere($dblink,$id);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;

                

                case "Annee" :
                    

                    switch ($url[2]) {

                        case "insertAnnee" :
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertAnnee($dblink, $_POST);
                            sendJSON($resp);
                            break;
        
                        case "getAnnee" :
                            $resp = $execQuery->getAnnee($dblink);
                            sendJSON($resp);
                            break;
                        

                        case "getLastAnnee" :
                            $resp = $execQuery->getLastAnnee($dblink);
                            sendJSON($resp);
                            break;
        
                        case "editAnnee":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            $resp = $execQuery->editAnnee($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteAnnee":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteAnnee($dblink,$id);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;


                case "Trimestre" :
                    

                    switch ($url[2]) {

                        case "insertTrimestre" :
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertTrimestre($dblink, $_POST);
                            sendJSON($resp);
                            break;
        
                        case "getTrimestre" :
                            $resp = $execQuery->getTrimestre($dblink);
                            sendJSON($resp);
                            break;
        
                        case "editTrimestre":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            $resp = $execQuery->editTrimestre($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteTrimestre":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteTrimestre($dblink,$id);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;




                case "Jour" :
                    

                    switch ($url[2]) {

                        case "insertJour" :
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertJour($dblink, $_POST);
                            sendJSON($resp);
                            break;
        
                        case "getJour" :
                            $resp = $execQuery->getJour($dblink);
                            sendJSON($resp);
                            break;
        
                        case "editJour":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            $resp = $execQuery->editJour($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteJour":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteJour($dblink,$id);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;



                case "Seance" :

                    switch ($url[2]) {

                        case "insertSeance" :
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            $resp = $execQuery->insertSeance($dblink, $_POST);
                            sendJSON($resp);
                            break; 
        
                        case "getSeanceByProf" :
                            if (isset($url[3])) {
                                $id1 = (int) $url[3] ;
                            }

                            if (isset($url[4])) {
                                $id2 = (int) $url[4] ;
                            }

                            if (isset($url[5])) {
                                $id3 = (int) $url[5] ;
                            }
                            $resp = $execQuery->getSeanceByProf($dblink,$id1,$id2,$id3) ;
                            sendJSON($resp);
                            break;

                        case "getSeanceByClasse" :
                            if (isset($url[3])) {
                                $id1 = (int) $url[3] ;
                            }

                            if (isset($url[4])) {
                                $id2 = (int) $url[4] ;
                            }

                            if (isset($url[5])) {
                                $id3 = (int) $url[5] ;
                            }
                            $resp = $execQuery->getSeanceByClasse($dblink,$id1,$id2,$id3);
                            sendJSON($resp);
                            break;
            
        
                        case "editSeance":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            $resp = $execQuery->editJour($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteSeance":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteJour($dblink,$id);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;



                case "Note" :
                    

                    switch ($url[2]) {

                        case "insertNote" :
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id1 = (int) $url[3] ;
                            }
                            if (isset($url[4])) {
                                $id2 = (int) $url[4] ;
                            }
                            if (isset($url[5])) {
                                $id3 = (int) $url[5] ;
                            }
                            if (isset($url[6])) {
                                $id4 = (int) $url[6] ;
                            }
                            if (isset($url[7])) {
                                $id5 = (int) $url[7] ;
                            }
                            $resp = $execQuery->insertNote($dblink,$_POST,$id1,$id2,$id3,$id4,$id5);
                            sendJSON($resp);
                            break;
                    

                        case "getNote" :
                            if (isset($url[3])) {
                                $id1 = (int) $url[3] ;
                            }
                            if (isset($url[4])) {
                                $id2 = (int) $url[4] ;
                            }
                            if (isset($url[5])) {
                                $id3 = (int) $url[5] ;
                            }
                            if (isset($url[6])) {
                                $id4 = (int) $url[6] ;
                            }
                            if (isset($url[7])) {
                                $id5 = (int) $url[7] ;
                            }
                            $resp = $execQuery->getNote($dblink,$id1, $id2,$id3,$id4,$id5);
                            sendJSON($resp);
                            break;
                        

                            case "getCountNoteByTrimestre" :
                                if (isset($url[3])) {
                                    $id1 = (int) $url[3] ;
                                }
                                if (isset($url[4])) {
                                    $id2 = (int) $url[4] ;
                                }
                                if (isset($url[5])) {
                                    $id3 = (int) $url[5] ;
                                }
                                if (isset($url[6])) {
                                    $id4 = (int) $url[6] ;
                                }
                                
                                $resp = $execQuery->getCountNoteByTrimestre($dblink,$id1, $id2,$id3,$id4);
                                sendJSON($resp);
                                break;
        
                        case "getNoteID":
                            if (isset($url[3])) {
                                $id1 = (int) $url[3] ;
                            }
                            if (isset($url[4])) {
                                $id2 = (int) $url[4] ;
                            }
                            if (isset($url[5])) {
                                $id3 = (int) $url[5] ;
                            }
                            if (isset($url[6])) {
                                $id4 = (int) $url[6] ;
                            }
                            if (isset($url[7])) {
                                $id5 = (int) $url[7] ;
                            }

                            $resp = $execQuery->getNoteID($dblink,$id1,$id2,$id3,$id4,$id5);
                            sendJSON($resp);
                            break;

                        case "editNote":
                            $input = file_get_contents('php://input');
                            $_POST = json_decode($input, true);
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }

                            $resp = $execQuery->editNote($dblink,$_POST,$id);
                            sendJSON($resp);
                            break;
                        
                        case "deleteNote":
                            if (isset($url[3])) {
                                $id = (int) $url[3] ;
                            }
                            
                            $resp = $execQuery->deleteNote($dblink,$id);
                            sendJSON($resp);
                            break;

                    }
                    
                break ;


                default:
                    throw new Exception("La demande n'est pas valide, vérifiez l'url1");
            }
        } else {
            throw new Exception("Problème d'authentification.");
        }
    } else {
        throw new Exception("Problème de récupération de données.");
    }
} catch (Exception $e) {
    $erreur = [
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}




function sendJSON($infos) // fonction de retour donnees en JSON
{
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header('Access-Control-Allow-Methods: *');

    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}
