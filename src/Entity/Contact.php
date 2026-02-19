<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    #[Assert\NotBlank(message: 'Please enter contact firstname.')]
    #[Assert\Length(min: 2, max: 64, minMessage: 'Contact firstname must be at least {{ limit }} characters long.', maxMessage: 'Contact firstname cannot be longer than {{ limit }} characters.')]
    private ?string $firstname = null;

    #[ORM\Column(length: 64)]
    #[Assert\NotBlank(message: 'Please enter contact lastname.')]
    #[Assert\Length(min: 2, max: 64, minMessage: 'Contact lastname must be at least {{ limit }} characters long.', maxMessage: 'Contact lastname cannot be longer than {{ limit }} characters.')]
    private ?string $lastname = null;

    #[ORM\Column(length: 32, nullable: true)]
    #[Assert\Length(max: 32, maxMessage: 'Contact phone cannot be longer than {{ limit }} characters.')]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please enter contact email.')]
    #[Assert\Email(message: 'The email "{{ value }}" is not a valid email.')]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(max: 2048, maxMessage: 'Contact note cannot be longer than {{ limit }} characters.')]
    private ?string $note = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getSlug(): string
    {
        $slugger = new AsciiSlugger();
        return strtolower($slugger->slug((string) $this->firstname . '-' . (string) $this->lastname));
    }
}
