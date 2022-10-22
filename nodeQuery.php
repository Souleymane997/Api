<?php

class QueryNodeJS
{

// *****************************************************************

// *                             API REQUEST                       *

// *****************************************************************








   // *****************************************************************

   // *                    ANNEE SCOLAIRE                             *

   // *****************************************************************

   function getAnnee($dblink)
   {
      $requete = "SELECT * FROM anneescolaire ORDER BY idAnnee";
      $resultat = mysqli_query($dblink, $requete);
      $tabs = [];

      while ($tab = $resultat->fetch_assoc()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }

   function getLastAnnee($dblink)
   {
      $requette = "SELECT idAnnee FROM anneescolaire ORDER BY idAnnee DESC LIMIT 1";
      $resultat = mysqli_query($dblink, $requette);
      return  $resultat->fetch_array()['idAnnee'];
   }

   function insertAnnee($dblink,$data)
   {
      $requete = $dblink->prepare("INSERT INTO anneescolaire (libelleAnnee) VALUES (?)");
      $requete->bind_param("s", $data["libelleAnnee"]);
      $resultat = $requete->execute();


      return $resultat;
   }


   function editAnnee($dblink, $data,$id)
   {
      $requete = $dblink->prepare("UPDATE anneescolaire SET libelleAnnee= ? WHERE idAnnee = ? ");
      $requete->bind_param("si", $data["libelleAnnee"],$id);
      $resultat = $requete->execute();

      return $resultat;
   }


   function deleteAnnee($dblink, $id)
   {
      $requette = "DELETE FROM anneescolaire WHERE idAnnee =".$id;
      $resultat = mysqli_query($dblink, $requette);

      return $resultat;
   }

// *****************************************************************
// *****************************************************************






   // *****************************************************************

   // *                    ELEVES                                     *

   // *****************************************************************

   // on retrouve les eleves par rapport a la classe et l'année scolaire
   function getAllEleve($dblink, $id1 , $id2)
   {

      $requete = "SELECT e.* FROM eleves e JOIN annee_eleve_classe ON e.idEleve = annee_eleve_classe.idEleve JOIN anneescolaire ON anneescolaire.idAnnee = annee_eleve_classe.idAnnee JOIN classe ON classe.idClasse = annee_eleve_classe.idClasse WHERE classe.idClasse =".$id1." AND anneescolaire.idAnnee =".$id2;
      $resultat = mysqli_query($dblink, $requete);
      $tabs = [];
      while ($tab = $resultat->fetch_assoc()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }

   function getCountEleve($dblink, $id1,$id2)
   {
      $requette = "SELECT COUNT(e.idEleve) as count FROM eleves e JOIN annee_eleve_classe ON e.idEleve = annee_eleve_classe.idEleve JOIN anneescolaire ON anneescolaire.idAnnee = annee_eleve_classe.idAnnee JOIN classe ON classe.idClasse = annee_eleve_classe.idClasse WHERE classe.idClasse =".$id1." AND anneescolaire.idAnnee =".$id2;

      $resultat = mysqli_query($dblink, $requette);
      return  $resultat->fetch_array()[0];
   }


   function insertLien($dblink,$data)
   {
      $requette = $dblink->prepare("INSERT INTO annee_eleve_classe (idEleve,idClasse,idAnnee) VALUES (?,?,?)");
      $requette->bind_param("iii", $data["idEleve"], $data["idClasse"], $data["idAnnee"]);
      $resultat = $requette->execute();
      return $resultat;
   }

   function getLastEleve($dblink)
   {
      $requette = "SELECT idEleve FROM eleves ORDER BY idEleve DESC LIMIT 1; ";
      $resultat = mysqli_query($dblink, $requette);
      return  $resultat->fetch_array()['idEleve'];
   }


   function insertEleve($dblink,$data)
   {
      $requete = $dblink->prepare("INSERT INTO eleves (nomEleve,prenomEleve,dateNaissance,phoneParent) VALUES (?,?,?,?)");
      $requete->bind_param("ssss", $data["nomEleve"], $data["prenomEleve"], $data["dateNaissance"], $data["phoneParent"]);
      $resultat = $requete->execute();
      return $resultat;
   }

   function editEleve($dblink, $data,$id)
   {
      $requete = $dblink->prepare("UPDATE eleves SET nomEleve= ? ,prenomEleve= ? ,dateNaissance= ? ,phoneParent= ? WHERE idEleve = ? ");
      $requete->bind_param("ssssi", $data["nomEleve"], $data["prenomEleve"], $data["dateNaissance"], $data["phoneParent"],$id);
      $resultat = $requete->execute();
      return $resultat;
   }

   function deleteEleve($dblink, $id)
   {
      $requette = "DELETE FROM eleves WHERE idEleve =".$id;
      $resultat = mysqli_query($dblink, $requette);
      return $resultat;
   }

// *****************************************************************
// *****************************************************************


   // *****************************************************************

   // *                    CLASSES                                    *

   // *****************************************************************

   function getAllClasse($dblink)
   {
      $requete = "SELECT * FROM classe ORDER by idClasse DESC";
      $resultat = mysqli_query($dblink, $requete);
      $tabs = [];
      while ($tab = $resultat->fetch_assoc()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }

   function insertClasse($dblink,$data)
   {
      $requete = $dblink->prepare("INSERT INTO classe (libelleClasse) VALUES (?)");
      $requete->bind_param("s", $data["libelleClasse"]);
      $resultat = $requete->execute();
      return $resultat;
   }

   function editClasse($dblink, $data,$id)
   {
      $requete = $dblink->prepare("UPDATE classe SET libelleClasse = ? WHERE idClasse = ? ");
      $requete->bind_param("si", $data["libelleClasse"],$id);
      $resultat = $requete->execute();
      return $resultat;
   }

   function deleteClasse($dblink, $id)
   {
      $requette = "DELETE FROM classe WHERE idClasse =".$id;
      $resultat = mysqli_query($dblink, $requette);
      return $resultat;
   }


// *****************************************************************
// *****************************************************************








   // *****************************************************************

   // *                    MATIERES                                   *

   // *****************************************************************

   function getMatiere($dblink)
   {

      $requette = "SELECT * FROM matieres ORDER BY idMatieres DESC";
      $resultat = mysqli_query($dblink, $requette);
      $tabs = [];
      while ($tab = $resultat->fetch_assoc()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }

   function insertMatiere($dblink,$data)
   {
      $requete = $dblink->prepare("INSERT INTO matieres (libelleMatieres) VALUES (?)");
      $requete->bind_param("s", $data["libelleMatieres"]);
      $resultat = $requete->execute();
      return $resultat;
   }

   function editMatiere($dblink, $data,$id)
   {
      $requete = $dblink->prepare("UPDATE matieres SET libelleMatieres = ? WHERE idMatieres = ? ");
      $requete->bind_param("si", $data["libelleMatieres"],$id);
      $resultat = $requete->execute();
      return $resultat;
   }

   function deleteMatiere($dblink, $id)
   {
      $requette = "DELETE FROM matieres WHERE idMatieres =".$id;
      $resultat = mysqli_query($dblink, $requette);
      return $resultat;
   }

// *****************************************************************
// *****************************************************************

   





   // *****************************************************************

   // *                    TRIMESTRE                                  *

   // *****************************************************************

   function getTrimestre($dblink)
   {

      $requette = "SELECT * FROM trimestre ";
      $resultat = mysqli_query($dblink, $requette);
      $tabs = [];
      while ($tab = $resultat->fetch_assoc()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }

   function insertTrimestre($dblink,$data)
   {
      $requete = $dblink->prepare("INSERT INTO trimestre (libelleTrimestre) VALUES (?)");
      $requete->bind_param("s", $data["libelleTrimestre"]);
      $resultat = $requete->execute();
      return $resultat;
   }

   function editTrimestre($dblink, $data,$id)
   {
      $requete = $dblink->prepare("UPDATE trimestre SET libelleTrimestre = ? WHERE idTrimestre = ? ");
      $requete->bind_param("si", $data["libelleTrimestre"],$id);
      $resultat = $requete->execute();
      return $resultat;
   }

   function deleteTrimestre($dblink, $id)
   {
      $requette = "DELETE FROM trimestre WHERE idTrimestre =".$id;
      $resultat= mysqli_query($dblink, $requette);
      return $resultat;
   }





// *****************************************************************
// *****************************************************************


  // *****************************************************************

  // *                    NOTES                                      *

  // *****************************************************************

    // $id1 : idEleve , $id2 :  idTrimestre   , $id3 :  idMatiere , $id4 : idAnnee , $id5 : idClasse
   function getNote($dblink , $id1 , $id2 , $id3 , $id4 , $id5)
   {

      $requette = "SELECT n.notesEleve,n.numNote FROM eleves e JOIN annee_eleve_classe ON e.idEleve = annee_eleve_classe.idEleve JOIN anneescolaire ON anneescolaire.idAnnee = annee_eleve_classe.idAnnee JOIN classe ON classe.idClasse = annee_eleve_classe.idClasse JOIN notes n ON n.idCount = annee_eleve_classe.idCount WHERE e.idEleve = $id1 and n.idTrimestre = $id2 and n.idMatiere = $id3 and annee_eleve_classe.idAnnee = $id4 and annee_eleve_classe.idClasse = $id5 ORDER by n.numNote asc";

      $resultat = mysqli_query($dblink, $requette);
      $tabs = [];
      while ($tab = $resultat->fetch_assoc()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }


    // $id1 : idTrimestre , $id2 : idMatiere , $id3 : idAnnee , $id4 : idClasse 
   function getCountNoteByTrimestre($dblink , $id1 , $id2 , $id3 , $id4)
   {

      $requette = "SELECT COUNT(DISTINCT(n.numNote)) FROM eleves e JOIN annee_eleve_classe ON e.idEleve = annee_eleve_classe.idEleve JOIN anneescolaire ON anneescolaire.idAnnee = annee_eleve_classe.idAnnee JOIN classe ON classe.idClasse = annee_eleve_classe.idClasse JOIN notes n ON n.idCount = annee_eleve_classe.idCount WHERE n.idTrimestre = $id1 and n.idMatiere = $id2 and annee_eleve_classe.idAnnee = $id3 and annee_eleve_classe.idClasse = $id4 ";

      $resultat = mysqli_query($dblink, $requette);
      return  $resultat->fetch_array()[0];
   }


   // $id1 : idEleve , $id2 : idAnnee , $id3 : numNote , $id4 : idTrimestre , $id5 : idMatiere
   function insertNote($dblink,$data ,  $id1 , $id2 , $id3,$id4,$id5 )
   {
      $requete = "SELECT idCount FROM annee_eleve_classe WHERE idEleve = $id1 AND idAnnee = $id2 ";
      $resultat = mysqli_query($dblink, $requete);
      $id =(int) $resultat->fetch_array()[0];
      $requette = $dblink->prepare("INSERT INTO notes (numNote, idTrimestre, idCount , idMatiere ,notesEleve ,dateNote) VALUES (?,?,?,?,?,?)");

      $requette->bind_param("iiiids",$id3,$id4,$id,$id5,$data['notesEleve'] , $data['dateNote']);
      $resultats = $requette->execute();

      return $resultats;
   }


    // $id1 : idEleve , $id2 : idAnnee , $id3 : numNote , $id4 : idTrimestre , $id5 : idMatiere
   function getNoteID($dblink,$id1 , $id2 , $id3,$id4,$id5)
   {
      $requete = "SELECT idCount FROM annee_eleve_classe WHERE idEleve = $id1 AND idAnnee = $id2 ";
      $resultat = mysqli_query($dblink, $requete);
      $id =(int) $resultat->fetch_array()[0];

      $requetes = "SELECT idNote FROM notes WHERE numNote = $id3 and idTrimestre = $id4 and idMatiere =$id5 and  idCount = $id ";
      $resultat = mysqli_query($dblink, $requetes);

      return $resultat->fetch_array()[0];
   }

 // $id1 : numNote , $id2 : idTrimestre 
   function editNote($dblink,$data,$id)
   {
      $requette = $dblink->prepare("UPDATE notes SET notesEleve= ? ,dateNote= ?,numNote= ?,idTrimestre=?  WHERE idNote =?");
      $requette->bind_param("dsiii",$data["notesEleve"], $data["dateNote"],$data["numNote"],$data["idTrimestre"],$id);
      $resultat = $requette->execute();
      return $resultat;
   }



   function deleteNote($dblink, $id)
   {
      $requette = "DELETE FROM notes WHERE idNote =".$id;
      $resultat = mysqli_query($dblink, $requette);
      return $resultat;
   }




   // *****************************************************************
// *****************************************************************









// *****************************************************************

   // *                    JOUR DE LA SEMAINE                            *

   // *****************************************************************

   function getJour($dblink)
   {
      $requete = "SELECT * FROM jour";
      $resultat = mysqli_query($dblink, $requete);
      $tabs = [];

      while ($tab = $resultat->fetch_assoc()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }

   function insertJour($dblink,$data)
   {
      $requete = $dblink->prepare("INSERT INTO jour (libelleJour) VALUES (?)");
      $requete->bind_param("s", $data["libelleJour"]);
      $resultat = $requete->execute();


      return $resultat;
   }


   function editJour($dblink, $data,$id)
   {
      $requete = $dblink->prepare("UPDATE jour SET libelleJour= ? WHERE idJour = ? ");
      $requete->bind_param("si", $data["libelleJour"],$id);
      $resultat = $requete->execute();

      return $resultat;
   }


   function deleteJour($dblink, $id)
   {
      $requette = "DELETE FROM jour WHERE idJour =".$id;
      $resultat = mysqli_query($dblink, $requette);

      return $resultat;
   }

// *****************************************************************
// *****************************************************************

// *****************************************************************

// *                   ENSEIGNANT                               *

// *****************************************************************

// on retrouve les eleves par rapport a la classe et l'année scolaire
function getAllEns($dblink)
{

   $requete = "SELECT * FROM enseignant ORDER BY idEns DESC";
   $resultat = mysqli_query($dblink, $requete);
   $tabs = [];
   while ($tab = $resultat->fetch_assoc()) {
      $tabs[] = $tab;
   }
   return  $tabs;

}


function insertEns($dblink,$data)
{
   $requete = $dblink->prepare("INSERT INTO enseignant (nomEns,prenomEns,dateNaissance,phone) VALUES (?,?,?,?)");
   $requete->bind_param("ssss", $data["nomEns"], $data["prenomEns"], $data["dateNaissance"], $data["phone"]);
   $resultat = $requete->execute();
   return $resultat;
}


   // *****************************************************************
// *****************************************************************













// *****************************************************************
// *****************************************************************

// *****************************************************************

// *                   SEANCES                           *

// *****************************************************************

// on retrouve l'emploi d'une classe
// $id1 : idJour , $id2 :  idClasse   , $id3 :  idAnnee 
function getSeanceByClasse($dblink,$id1,$id2,$id3)
{
   $requete = "SELECT * FROM `seance` WHERE idJour = $id1 and idClasse = $id2 and idAnnee = $id3 ORDER BY heureDebut ASC";
   $resultat = mysqli_query($dblink, $requete);
   $tabs = [];
   while ($tab = $resultat->fetch_assoc()) {
      $tabs[] = $tab;
   }
   return  $tabs;

}


// $id1 : idJour , $id2 :  idEns   , $id3 :  idAnnee 
function getSeanceByProf($dblink,$id1,$id2,$id3)
{

   $requete = "SELECT * FROM `seance` WHERE idJour = $id1 and idEns = $id2 and idAnnee = $id3 ORDER BY heureDebut ASC";
   $resultat = mysqli_query($dblink, $requete);
   $tabs = [];
   while ($tab = $resultat->fetch_assoc()) {
      $tabs[] = $tab;
   }
   return  $tabs;

}



function insertSeance($dblink,$data)
{
   $requete = $dblink->prepare("INSERT INTO seance (idClasse,idJour,idAnnee,idEns,idMatieres,heureDebut,heureFin) VALUES (?,?,?,?,?,?,?)");
   $requete->bind_param("sssssss",$data["idClasse"],$data["idJour"],$data["idAnnee"], $data["idEns"] , $data["idMatieres"] , $data["heureDebut"] , $data["heureFin"]);
   $resultat = $requete->execute();
   return $resultat;
}


// *****************************************************************
// *****************************************************************
















/*

SELECT n.notesEleve,n.dateNote FROM eleves e JOIN annee_eleve_classe ON e.idEleve = annee_eleve_classe.idEleve JOIN anneescolaire ON anneescolaire.idAnnee = annee_eleve_classe.idAnnee JOIN classe ON classe.idClasse = annee_eleve_classe.idClasse
JOIN notes n ON n.idCount = annee_eleve_classe.idCount WHERE e.idEleve = 1 and n.idTrimestre = 1 and n.idMatiere = 1 and annee_eleve_classe.idAnnee = 1 and
annee_eleve_classe.idClasse = 1

SELECT DISTINCT n.numNote,anneescolaire.libelleAnnee FROM eleves e JOIN annee_eleve_classe ON e.idEleve = annee_eleve_classe.idEleve JOIN anneescolaire ON anneescolaire.idAnnee = annee_eleve_classe.idAnnee JOIN classe ON classe.idClasse = annee_eleve_classe.idClasse JOIN notes n ON n.idCount = annee_eleve_classe.idCount WHERE n.idTrimestre = 1 and n.idMatiere = 1 and annee_eleve_classe.idAnnee = 1 and annee_eleve_classe.idClasse = 1


   function loginVendor($dblink, $data)
   {
    $requete = $dblink->prepare("SELECT * FROM fournisseur WHERE contact = ? AND password = ?");
      $requete->bind_param("ss", $data["contact_client"], $data["password_client"]);
      $requete->execute();
      $resultat = $requete->get_result(); // get the mysqli result
      $user = $resultat->fetch_assoc();

      return $user;
   }

   function getvendor($dblink)
   {

      $requette = "SELECT * FROM fournisseur ORDER BY id_Fournisseur DESC ";
      $resultat = mysqli_query($dblink, $requette);

      $tabs = [];

      while ($tab = $resultat->fetch_array()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }

   function getVendorById($dblink, $param1)
   {

      $requette = "SELECT * FROM fournisseur WHERE id_Fournisseur = " . $param1;
      $resultat = mysqli_query($dblink, $requette);

      // while ($tab = $resultat->fetch_assoc()) {
      //    $tabs[] = $tab;
      // }
      return  $resultat->fetch_assoc();
   }

   function getVendorProductCount($dblink, $param1)
   {

      $requette = "SELECT count(*) as count FROM produit WHERE id_fournisseur = " . $param1;
      $resultat = mysqli_query($dblink, $requette);
      
      return  $resultat->fetch_assoc()["count"];
   }

   function getVendorProduct($dblink, $param1)
   {

      $requette = "SELECT * FROM produit WHERE id_fournisseur = " . $param1;
      $resultat = mysqli_query($dblink, $requette);
      $tabs = [];
      while ($tab = $resultat->fetch_assoc()) {
         $tabs[] = $tab;
      }
      return  $tabs;
   }

   function postvendor($dblink, $data)
   {

      $requete = $dblink->prepare("INSERT INTO fournisseur(nom_Fournisseur, prenom_Fournisseur, email, contact,password, numero_ifu, numero_bccm, domaine, numero_cnib, date_cnib, date_naissance, pers_a_prevenir, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $requete->bind_param("sssssssssssss", $data["nom_Fournisseur"], $data["prenom_Fournisseur"], $data["email"], $data["contact"], $data["password"], $data["numero_ifu"], $data["numero_bccm"], $data["domaine"], $data["numero_cnib"], $data["date_cnib"], $data["date_naissance"], $data["pers_a_prevenir"], $data["image"]);
      $resultat = $requete->execute();

      return $resultat;
   }


   function deletevendor($dblink, $param1)
   {

      $requette = "DELETE FROM sous_categorie WHERE id_sous_cat = " . $param1;
      $resultat_categorie = mysqli_query($dblink, $requette);

      return $resultat_categorie;
   }


   function putVendor($dblink, $data, $param1)
   {

      // var_dump($data);
      // die();

      $requete = $dblink->prepare("UPDATE fournisseur SET nom_Fournisseur=?,prenom_Fournisseur=?,email=?,contact=?,password=?,numero_ifu=?,numero_bccm=?,domaine=?,numero_cnib=?,date_cnib=?,date_naissance=?,pers_a_prevenir=?, image=? WHERE id_Fournisseur = ?");
      $requete->bind_param("sssssssssssssi", $data["nom_Fournisseur"], $data["prenom_Fournisseur"], $data["email"], $data["contact"], $data["password"], $data["numero_ifu"], $data["numero_bccm"], $data["domaine"], $data["numero_cnib"], $data["date_cnib"], $data["date_naissance"], $data["pers_a_prevenir"], $data["image"], $param1);

      $resultat = $requete->execute();



      return $resultat;
   }
   
   
   // *****************************************************************
   // *****************************************************************
   
   
   // *****************************************************************

   // *                          LIVREUR                              *

   // *****************************************************************
   
 */

   // *****************************************************************
   // *****************************************************************
}
