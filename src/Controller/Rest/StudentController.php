<?php
namespace App\Controller\Rest {

    use App\Repository\StudentRepository;
    use FOS\RestBundle\Controller\FOSRestController ;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    /**
     * Class StudentController
     */
    class StudentController extends FOSRestController
    {
        /**
         * @var StudentRepository
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
         * Retrieves an Student resource
         * @Rest\Get("/student/{studentId}")
         */
        public function getStudent(int $studentId): View
        {
            $student = $this->StudentRepository->findById($studentId);

            if (!$student) {
                throw new EntityNotFoundException('Article with id ' . $studentId . ' does not exist!');
            }

            // In case our GET was a success we need to return a 200 HTTP OK response with the request object
            return View::create($student, Response::HTTP_OK);
        }

        /**
         * Retrieves a collection of Student resource
         * @Rest\Get("/students/{departmentId}")
         */
        public function getArticles(int $departmentId): View
        {
            $students = $this->StudentRepository->findBy(["department" => $departmentId]);
            // In case our GET was a success we need to return a 200 HTTP OK response with the collection of student object
            return View::create($students, Response::HTTP_OK);
        }
    }
}