<?php

namespace App\Controller {

    use App\Entity\Student;
    use App\Form\StudentType;
    use App\Repository\StudentRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/student")
     */
    class StudentController extends AbstractController
    {

        /**
         * StudentController constructor.
         */
        private $StudentRepository;

        /**
         * StudentController constructor.
         * @param StudentRepository $studentRepository
         */
        public function __construct(StudentRepository $studentRepository)
        {
            $this->StudentRepository = $studentRepository;
        }

        /**
         * @Route("/", name="app_student_index", methods={"GET"})
         */
        public function index(): Response
        {
            return $this->render('student/index.html.twig', [
                'students' => $this->StudentRepository->findAll(),
            ]);
        }

        /**
         * @Route("/new", name="app_student_new", methods={"GET", "POST"})
         */
        public function new(Request $request): Response
        {
            $student = new Student();
            $form = $this->createForm(StudentType::class, $student);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->StudentRepository->add($student);
                return $this->redirectToRoute('app_student_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('student/new.html.twig', [
                'student' => $student,
                'form' => $form->createView(),
            ]);
        }

        /**
         * @Route("/{id}", name="app_student_show", methods={"GET"})
         */
        public function show(Student $student): Response
        {
            return $this->render('student/show.html.twig', [
                'student' => $student,
            ]);
        }

        /**
         * @Route("/{id}/edit", name="app_student_edit", methods={"GET", "POST"})
         */
        public function edit(Request $request, Student $student): Response
        {
            $form = $this->createForm(StudentType::class, $student);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->StudentRepository->add($student);
                return $this->redirectToRoute('app_student_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('student/edit.html.twig', [
                'student' => $student,
                'form' => $form->createView(),
            ]);
        }

        /**
         * @Route("/{id}", name="app_student_delete", methods={"POST"})
         */
        public function delete(Request $request, Student $student): Response
        {
            if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
                $this->StudentRepository->remove($student);
            }

            return $this->redirectToRoute('app_student_index', [], Response::HTTP_SEE_OTHER);
        }
    }
}
