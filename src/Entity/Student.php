<?php

namespace App\Entity {

    use App\Repository\StudentRepository;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass=StudentRepository::class)
     */
    class Student
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
        private $FirstName;

        /**
         * @ORM\Column(type="string", length=25)
         */
        private $LastName;

        /**
         * @ORM\Column(type="integer")
         */
        private $NumEtud;

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
        public function getFirstName(): ?string
        {
            return $this->FirstName;
        }

        /**
         * @param string $FirstName
         * @return Student
         */
        public function setFirstName(string $FirstName): self
        {
            $this->FirstName = $FirstName;

            return $this;
        }

        /**
         * @return null|string
         */
        public function getLastName(): ?string
        {
            return $this->LastName;
        }

        /**
         * @param string $LastName
         * @return Student
         */
        public function setLastName(string $LastName): self
        {
            $this->LastName = $LastName;

            return $this;
        }

        /**
         * @return int|null
         */
        public function getNumEtud(): ?int
        {
            return $this->NumEtud;
        }

        /**
         * @param int $NumEtud
         * @return Student
         */
        public function setNumEtud(int $NumEtud): self
        {
            $this->NumEtud = $NumEtud;

            return $this;
        }
    }
}
