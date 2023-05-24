<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use App\Entity\Tirages;
use App\Entity\Inscriptions;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(ManagerRegistry $registry): Response
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
            'grillesLoto' => null,
        ]);
    }
}
