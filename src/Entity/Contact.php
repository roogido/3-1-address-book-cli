<?php declare(strict_types=1);
/**
 * Contact.php
 *
 * Représente un contact en mémoire (entité métier).
 * Contient les propriétés id, name, email, phoneNumber,
 * leurs accesseurs/mutateurs ainsi que la méthode magique __toString().
 *
 * Date : Mercredi 26 novembre 2025
 * Maj  : Vendredi 28 novembre 2025
 * Auteur : Salem Hadjali
 */

namespace App\Entity;



class Contact
{
    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $phoneNumber;

    public function __construct(
        ?int $id,
        ?string $name,
        ?string $email,
        ?string $phoneNumber
    ) {
        $this->id          = $id;
        $this->name        = $name;
        $this->email       = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function getId(): ?int                                   // getter
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void                    // setter
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Convertit l'objet Contact en chaîne de caractères lisible.
     *
     * Cette méthode magique est automatiquement appelée lorsque
     * l'objet est utilisé dans un contexte textuel (echo, print, concaténation...).
     *
     * @return string Représentation textuelle du contact.
     */
    public function __toString(): string
    {
        return sprintf(
            "ID: %d, Nom: %s, Email: %s, Téléphone: %s",
            $this->id,
            $this->name,
            $this->email,
            $this->phoneNumber
        );
    }

}
