<?php

namespace  App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Societe;
use App\Entity\Ville;
use App\Entity\Contact;
use App\Entity\Projet;

/**
 * Created by PhpStorm.
 * User: Muzubi
 * Date: 20/04/2018
 * Time: 14:04
 */
class AppController extends Controller
{

    /**
     * @Route("/accueil", name="accueil")
     */

    public function accueil(Request $request)
    {
//        Connexion base de données et récuperation des infos :
        $em = $this->getDoctrine()->getManager();
        //Appel de la classe société et recuperation d'un tableau
        $societes = $em->getRepository('App:Societe')->findAll(); //selection de toutes les société
        $contacts = $em->getRepository('App:Contact')->findAll(); //selection de tous les clients
        $projets = $em->getRepository('App:Projet')->findAll(); //selection de toutes les société
        $villes = $em->getRepository('App:Ville')->findAll(); //selection de toutes les villes

        return $this->render('/accueil.html.twig',[
            'societes'=>$societes,
            'contacts'=>$contacts,
            'projets'=>$projets,
            'villes'=>$villes
        ]);

    }
    /**
     * @Route("/Contacts/{id}", name="afficherContact")
     */

    public function afficherContacts(Request $request, $id )
    {
//        Connexion base de données et récuperation des infos :
        $em = $this->getDoctrine()->getManager();
        //Appel de la classe société et recuperation d'un tableau
//        $societes = $em->getRepository('App:Societe')->findOneBy(['nomSociete' => $nomSociete]); //selection de toutes les sociétés
        $societes =$em->getRepository('App:Societe')->find($id);
//        $contacts = $em->getRepository('App:Contact')->findBy(['societe' => $societes]); //selection de tous les clients
//        $villes = $em->getRepository('App:Ville')->findBy(['societe' => $societes]); //selection de toutes les villes

        return $this->render('/afficherContact.html.twig',[
            'societe'=>$societes,
//            'contacts'=>$contacts,
//            'villes'=>$villes
        ]);
    }

    /**
     * @Route("/Projets/{id}", name="afficherProjet")
     */

    public function afficherProjets(Request $request, $id )
    {
//        Connexion base de données et récuperation des infos :
        $em = $this->getDoctrine()->getManager();
        //Appel de la classe société et recuperation d'un tableau
        $societe = $em->getRepository('App:Societe')->find($id); //selection de toutes les société
//dump($societe);
//die('ici');
        return $this->render('/afficherProjet.html.twig',[
            'societe'=>$societe,

        ]);
    }


}