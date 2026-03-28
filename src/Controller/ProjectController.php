<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\Service\ProjectStatsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProjectController extends AbstractController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(
        ProjectRepository $repository,
        ProjectStatsService $stats
    ): Response
    {
        $projects = $repository->findAll();
        return $this->render('project/index.html.twig', [
            'projects' => $projects,
            'total' => $stats->getTotalCount(),
            'languages' => $stats->getLanguage(),
        ]);
    }

    #[Route('/projects/{id}', name: 'app_project_show')]
    public function show(Project $project): Response
    {
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

}
