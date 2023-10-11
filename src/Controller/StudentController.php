<?php

namespace App\Controller;

use App\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Student;
use App\Repository\StudentRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class StudentController extends AbstractController
{

    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    #[Route('/student/view/{id}', name: 'app_student_view')]
    public function view(int $id, StudentService $entityService): Response
    {
        return new Response($id);
    }

    #[Route('/studentCreate', name: 'app_studentCreate')]
    public function create( EntityManagerInterface $entityManager , Request $request): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class, $student);

        $form->handleRequest($request);
        if (!($form->isSubmitted() && $form->isValid())) {
            return $this->render('student/index.html.twig', [
                'student_form' => $form,
            ]);
        }
        $student = $form->getData();
        $entityManager->persist($student);
        $entityManager->flush();
        return $this->redirectToRoute('app_studentCreate');
    
    }

    #[Route('/student/update/{$id}', name: 'app_studentedit')]
    public function update(int $id, StudentRepository $StudentRepository): Response
        {
            $student = $StudentRepository->find($id);
            $form = $this->createForm(StudentsType::class, $student, ['method'=>'PUT']);
            return $this->render('student/index.html.twig', ['form'=>$form]);      
        }  
}
