<?php

namespace App\Service;

use App\Repository\ProjectRepository;

class ProjectStatsService
{
    public function __construct(
        private ProjectRepository $repository,
    ) {
    }

    public function getTotalCount(): int
    {
        return count($this->repository->findAll());
    }

    public function getLanguage(): array
    {
        $languages = [];

        $project = $this->repository->findAll();

        foreach ($project as $project) {
            $language = $project->getLanguage();
            if ($language && !in_array($language, $languages)) {
                $languages[] = $language;
            }
        }

        return $languages;
    }
}
