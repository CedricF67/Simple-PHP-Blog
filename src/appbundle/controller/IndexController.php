<?php

namespace Controllers;

class IndexController extends Controller {

	public function indexAction(){
		echo $this->twig->render('index\index.html');
	}

	public function contactFormAction(){
		echo 'contactForm';
	}

}