<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookstoreController extends AbstractController
{
    #[Route('/bookstore', name: 'app_bookstore')]
    public function index(): Response
    {
        return $this->render('bookstore/index.html.twig', [
            'BookstoreController' => 'Valeur',
        ]);
    }

    #[Route('/book/{id}/edit', name: 'app_book_edit')]
    public function edit(
        Book $book,
        Request $request,
        EntityManagerInterface $entityManager
        ): Response {
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid())
         {
            $entityManager->flush();
            return $this->redirectToRoute('app_bookstore');

        }
        return $this->render('bookstore/edit.html.twig', [
            'form' => $form->createView(),
        ]);


    }
}
