<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GitController extends Controller
{
    /**
     * @Route("/git", name="git")
     */
    public function index()
    {		
        $client = new \Github\Client(); // load git client
		$repos = $client->api('repo')->find('symfony'); // get all symfony repositories
		$repoList = [];
		if(isset($repos['repositories']) && !empty($repos['repositories'])) {
			$repoList = $repos['repositories'];
		}		
        return $this->render('git/index.html.twig', [
            'repoList' => $repoList,
        ]);
    }
}
