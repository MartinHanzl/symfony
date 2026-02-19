<?php

namespace App\Controller\Contact;

use App\Repository\Contact\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    /**
     * List all contacts.
     * @param ContactRepository $contactRepository
     * @return Response
     */
    #[Route('/', name: 'app_contact_index', methods: ['GET'])]
    public function index(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Detail of a contact.
     * @return void
     */
    #[Route('/contact', name: 'app_contact_contact', methods: ['GET'])]
    public function contact(){

    }
}
