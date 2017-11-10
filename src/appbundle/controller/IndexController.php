<?php

namespace Controllers;

use Models\Controller;

class IndexController extends Controller {

	public function indexAction(){
		echo $this->twig->render('index\index.html');
	}

	public function contactFormAction(){
		require '../src/appbundle/form/contactform.php';
		echo $this->twig->render('index\contact.html');
	}

}