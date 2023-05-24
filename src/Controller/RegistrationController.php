<?php
// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Entity\Tirages;
use App\Entity\Inscriptions;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(ManagerRegistry $registry): Response
    {
        // Récupérer tous les tirages à partir de la base de données
        $tirages = $registry->getRepository(Tirages::class)->findAll();

        // Récupérer toutes les inscriptions à partir de la base de données
        $inscriptions = $registry->getRepository(Inscriptions::class)->findAll();

        // Rendre la vue Twig avec la liste des tirages et des inscriptions
        return $this->render('index.html.twig', [
            'tirages' => $tirages,
            'inscriptions' => $inscriptions,
            'test' => "index",
            'grillesLoto' => $this->generateTable($_REQUEST['nbrGrille']),
        ]);
    }

    public function generateTable($nbrGrille){
        $tab = [];
        for($numGrille = 0; $numGrille<$nbrGrille; $numGrille++){
            $tab[]=[];
            for ($ligne = 0; $ligne < 3; $ligne++){
                $tab[$numGrille][] = [];
                do {
                    $elm = rand(1, 90);
                    if (!in_array($elm, $tab[$numGrille], true)) {
                        $tab[$numGrille][$ligne][] = $elm;
                    }
                } while(count($tab[$numGrille][$ligne]) < 5);

                for($i=0;$i<4;$i++){
                    $keys = array_rand($tab[$numGrille][$ligne]);
                    array_splice($tab[$numGrille][$ligne], $keys, 0, "");
                }
            }
        }

        return $tab;
    }
}
