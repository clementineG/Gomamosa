<?php
class Controleur
{    
  
  // Attributs
  private $fichierDeConfig; // fichier de configuration regulant le controle.
  private $modeDebug=false; // indique si le contrôleur est en mode debug ou pas.
  
 
  // -------------------------------------------------------
  // ------------------ Constructeur -----------------------
  // -------------------------------------------------------
  function __construct($fichierConfig)
    {
      // Enregistrement du fichier de config
      $this->fichierDeConfig = $fichierConfig;
      
      // Intégration des modules PHP de l'application
      $modules = glob('modules/*.php');      
      foreach ($modules as $moduleCourant)      
        include_once "$moduleCourant";      
      
      // Demarrage ou reprise de la session precedente.
      session_start();
    }


  // -------------------------------------------------------
  // ------------------ Observateurs -----------------------
  // -------------------------------------------------------

  public function getRequeteUtilisateur()
    {
      include"$this->fichierDeConfig";
      if ($_REQUEST['action'])
         return $_REQUEST['action'];
      else // 1er appel au controleur
        {
          unset($_SESSION['etat']);
          return $action_initiale;
         }
    }

  public function getEtatCourant()
    {
      include"$this->fichierDeConfig";
      $etatCourant = $_SESSION['etat'];
      if(!isset($etatCourant))
        $etatCourant = $etat_initial;

      return $etatCourant;
    }


  public function estValide ($requete,$etatCourant) 
    {
      include"$this->fichierDeConfig";
      
      // Verifie si l'action est autorisee vis a vis de l'etat courant
      $actionsAutorisees = $etats[$etatCourant]['actionsAutorisees'];        
      $enchainementAutorise = in_array($requete,$actionsAutorisees);
      
      if (!isset($enchainementAutorise)) $enchainementAutorise=false;
      return $enchainementAutorise;    
      
    }
    
    public function modeDebug()
    {return $this->modeDebug;}
    
    
  // -------------------------------------------------------
  // ------------------ Operateurs -----------------------
  // -------------------------------------------------------

  public function activerModeDebug()
  { 
   	$this->modeDebug = true;
    ini_set("display_errors","on");  
    ini_set("expose_php","on"); 
  }

  public function definirCommeInvalide(&$requete)
    { $requete = 'action_enchainementInvalide'; }


  public function deleguerTraitementRequete($requete)
    {
      include"$this->fichierDeConfig";
      $actionAexecuter = $actions[$requete];
      if($this->modeDebug())
       { 
         if(! file_exists($actionAexecuter))
           echo "<br /><font size=1> <b>[mode debug] : Le controleur cherche a executer l'action ayant pour nom [$requete]. D'apr&egrave;s le fichier de config, le code de cette action est cens&eacute; &ecirc;tre dans le fichier [$actionAexecuter] mais ce fichier n'existe pas. V&eacute;rifiez votre fichier de configuration dans la partie qui associe le nom d'une d'action avec le fichier qui l'impl&eacute;mente. </b></font> <br/><br/>";
       }
      include $actionAexecuter;
    }


  public function retournerVueReponse($etatCourant)
    {
      include"$this->fichierDeConfig";
      // Definir le modele de vue a utiliser pour repondre (en fonction de l'etat courant)
      $modeleVueAutiliser = $etats[$etatCourant]['modeleVueAafficher'];

      // Charger le fichier correspondant au modèle de vue à utiliser en réponse
      $fichierModeleVueAutiliser=$modelesVues[$modeleVueAutiliser];
      if($this->modeDebug())
       { 
         if(! file_exists($fichierModeleVueAutiliser))
           echo "<br /><font size=1> <b>[mode debug] : Le controleur cherche a charger le modele de vue pour nom [$modeleVueAutiliser]. D'apr&egrave;s le fichier de config, le code de ce mod&egrave;le est cens&eacute; &ecirc;tre dans le fichier [$fichierModeleVueAutiliser] mais ce fichier n'existe pas. V&eacute;rifiez votre fichier de configuration dans la partie qui associe le nom d'un mod&egrave;le de vue avec le fichier qui l'impl&eacute;mente.</b></font> <br/><br/>";
       }
      include $fichierModeleVueAutiliser;      
    }
} 
?>
