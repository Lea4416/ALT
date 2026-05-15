<?php

class Logiquestring
{
    public function compteSansEspace(string $chaine)
    {
        // echo "La chaine de cractére envoyé est '" . $chaine . " '. <br>";
        $chaine = str_replace(" ", "", $chaine);
        // echo $chaine . "<br>";
        $resultat = strlen($chaine);
        // echo $resultat . "  caractéres";
    }

    public function salutationPrenom(string $prenom)
    {
        // echo "Le prenom est ". $prenom ." <br>" ;
        $prenom = ucfirst($prenom);
        echo "Bonjour " . $prenom;
    }

    public function exclafin(string $cdcexcla)
    {
        // echo "La phrase rentré est " .$cdcexcla . "<br>";
        $dernier_caractere = substr($cdcexcla, -1);
        // echo "Le dernier caractére est " . $dernier_caractere . "<br>";
        if ($dernier_caractere !== "!") {
            echo "false";
            return;
        } else {
            echo "true";
            return;
        }
    }

    public function calcullettrechaine(string $chaine, string $lettre)
    {
        echo "La chaine de caractére recherché est $chaine <br> La lettre compté est" . $lettre;
        $resultat = substr_count($chaine, $lettre);
        echo "Il y a " . $resultat . " la lettre " . $lettre;
    }

    public function camelCase(string $chaine)
    {
        echo "La chaine de caractére est " . $chaine . ". <br>";
        $mots = explode("_", strtolower($chaine));

        $resultat = array_shift($mots);

        foreach ($mots as $mot) {
            $resultat .= ucfirst($mot);
        }
        echo "Sortie Camelcase $resultat.";
    }

    public function cvoyelle(string $chaine)
    {
        echo "La phrase analyser est $chaine";
        $voyelles = ["a", "e", "i", "o", "u", "y"];
        $resultat = [];
        foreach ($voyelles as $voyelle) {
            $resultat[$voyelle] = substr_count($chaine, $voyelle);
        }
        var_dump($resultat);
    }

    public function majmin(string $chaine)
    {
        echo "La phrase original est $chaine <br>";

        $resultat = "";
        for ($i = 0; $i < strlen($chaine); $i++) {
            if ($i % 2 == 0) {
                $resultat .= strtoupper($chaine[$i]);
            } else {
                $resultat .= strtolower($chaine[$i]);
            }
        }
        echo "Le resultat est $resultat";
    }

    // Pb si deux fois la meme lettre Je suis Lea sort J e s u i s L a
    // public function btn_doublon(string $messageUtilisateur){

    //     echo $messageUtilisateur;
    //     $messageUtilisateur = str_split($messageUtilisateur);
    //     $messageNettoye = array_unique($messageUtilisateur);
    //     $messageNettoye = implode(" ", $messageNettoye);
    //     echo $messageNettoye;
    // }

    public function initiales(string $prenom, string $nom)
    {
        $initiales = $prenom[0];
        $initiales .= $nom[0];
        $initiales = strtoupper($initiales);
        echo "Les initiales sont $initiales";
    }

    public function cachenum(int $carte, int $remplacement)
    {

        $resultat = substr($carte, 0, -$remplacement);
        $resultat .= str_repeat("X", $remplacement);

        echo $resultat;
    }
}
