<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Repository\DestinationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DestinationController extends AbstractController
{
    #[Route('/', name: 'app_destination_index')]
    public function index(DestinationRepository $destinationRepository): Response
    {
        $destinations = $destinationRepository->findBy([], ['id' => 'DESC']);

        return $this->render('destination/index.html.twig', [
            'destinations' => $destinations,
        ]);
    }

    #[Route('/destination/{id}', name: 'app_destination_show')]
    public function show(Destination $destination): Response
    {
        return $this->render('destination/show.html.twig', [
            'destination' => $destination,
        ]);
    }
}
