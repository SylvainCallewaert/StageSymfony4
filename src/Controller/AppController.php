<?php

namespace  App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Societe;
use App\Entity\Ville;
use App\Entity\Contact;

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
        $villes = $em->getRepository('App:Ville')->findAll(); //selection de toutes les villes

        return $this->render('/accueil.html.twig',[
            'societes'=>$societes,
            'contacts'=>$contacts,
            'villes'=>$villes
        ]);

    }
    /**
     * @Route("/Contacts/{nomSociete}", name="afficherContact")
     */

    public function afficherContacts(Request $request, $nomSociete )
    {
//        Connexion base de données et récuperation des infos :
        $em = $this->getDoctrine()->getManager();
        //Appel de la classe société et recuperation d'un tableau
        $societes = $em->getRepository('App:Societe')->findOneBy(['nomSociete' => $nomSociete]); //selection de toutes les société
        $contacts = $em->getRepository('App:Contact')->findBy(['societe' => $societes]); //selection de tous les clients
//        $villes = $em->getRepository('App:Ville')->findBy(['societe' => $societes]); //selection de toutes les villes

        return $this->render('/afficherContact.html.twig',[
            'societe'=>$societes,
            'contacts'=>$contacts,
//            'villes'=>$villes
        ]);
    }
}