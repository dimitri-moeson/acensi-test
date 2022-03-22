<?php

namespace App\Entity {

    use App\Repository\DepartmentRepository;
    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass=DepartmentRepository::class)
     */
    class Department
    {
        /**
         * @ORM\Id
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @ORM\Column(type="string", length=25)
         */
        private $Name;

        /**
         * @ORM\Column(type="integer")
         */
        private $Capacity;

        /**
         * @ORM\OneToMany(targetEntity=Student::class, mappedBy="Department")
         */
        private $students;

        public function __construct()
        {
            $this->students = new ArrayCollection();
        }

        /**
         * @return int|null
         */
        public function getId(): ?int
        {
            return $this->id;
        }

        /**
         * @return null|string
         */
        public function getName(): ?string
        {
            return $this->Name;
        }

        /**
         * @param string $Name
         * @return Department
         */
        public function setName(string $Name): self
        {
            $this->Name = $Name;

            return $this;
        }

        /**
         * @return int|null
         */
        public function getCapacity(): ?int
        {
            return $this->Capacity;
        }

        /**
         * @param int $Capacity
         * @return Department
         */
        public function setCapacity(int $Capacity): self
        {
            $this->Capacity = $Capacity;

            return $this;
        }

        /**
         * @return Collection<int, Student>
         */
        public function getStudent(): Collection
        {
            return $this->students;
        }

        public function addStudent(Student $student): self
        {
            if (!$this->students->contains($student)) {
                $this->students[] = $student;
                $student->setStudents($this);
            }

            return $this;
        }

        public function removeStudent(Student $student): self
        {
            if ($this->students->removeElement($student)) {
                // set the owning side to null (unless already changed)
                if ($student->getDepartment() === $this) {
                    $student->setDepartment(null);
                }
            }

            return $this;
        }
    }
}
