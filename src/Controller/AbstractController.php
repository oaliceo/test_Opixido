<?php

namespace App\Controller;


abstract class AbstractController
{
    protected function render(string $template, array $aParams, string $baseTemplate) : string
    {
        ob_start();

        extract($aParams);
        // affiche : inclusion du fichier de template
        include __DIR__ . '/../../templates/' .$baseTemplate;

        return ob_get_clean();
    }
}