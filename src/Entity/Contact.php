<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\String\Slugger\AsciiSlugger;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    #[Assert\NotBlank(message: 'Jméno je povinná položka.')]
    #[Assert\Length(min: 3, max: 64, minMessage: 'Jméno musí mít alespoň {{ limit }} znaky.', maxMessage: 'Jméno nemůže být delší než {{ limit }} znaků.')]
    private ?string $firstname = null;

    #[ORM\Column(length: 64)]
    #[Assert\NotBlank(message: 'Příjmení je povinná položka.')]
    #[Assert\Length(min: 3, max: 64, minMessage: 'Příjmení musí mít alespoň {{ limit }} znaky.', maxMessage: 'Příjmení nemůže být delší než {{ limit }} znaků.')]
    private ?string $lastname = null;

    #[ORM\Column(length: 32, nullable: true)]
    #[Assert\Length(max: 32, maxMessage: 'Telefonní číslo nemůže být delší než {{ limit }} znaků.')]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'E-mail je povinná položka.')]
    #[Assert\Email(message: 'Zadaný e-mail "{{ value }}" nemá platný formát.')]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(max: 2048, maxMessage: 'Poznámka nemůže být delší než {{ limit }} znaků.')]
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
