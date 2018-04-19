<?php

namespace RB\CarnetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="RB\CarnetBundle\Repository\NoteRepository")
 */
class Note
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="matiere", type="string", length=255)
     */
    private $matiere;

    /**
     * @var float
     *
     * @ORM\Column(name="chiffre", type="float")
     */
    private $chiffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime", nullable=true)
     */
    private $dateModification;

    /**
     * @ORM\ManyToOne(targetEntity="RB\CarnetBundle\Entity\Eleve", inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /*
     * Construct.
     *
     * 
     * @iniitalise la date du jour
     */
    public function __construct()
    {
        $this->dateCreation = new \Datetime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDateModification()
    {
        $this->setDateModification(new \Datetime());
    }


    /**
     * @ORM\PrePersist
     */
    public function increase()
    {
        $this->getEleve()->increaseNote();
    }

    /**
     * @ORM\PreRemove
     */
    public function decrease()
    {
        $this->getEleve()->decreaseNote();
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matiere.
     *
     * @param string $matiere
     *
     * @return Note
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere.
     *
     * @return string
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set chiffre.
     *
     * @param float $chiffre
     *
     * @return Note
     */
    public function setChiffre($chiffre)
    {
        $this->chiffre = $chiffre;

        return $this;
    }

    /**
     * Get chiffre.
     *
     * @return float
     */
    public function getChiffre()
    {
        return $this->chiffre;
    }

    /**
     * Set dateCreation.
     *
     * @param \DateTime $dateCreation
     *
     * @return Note
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation.
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModification.
     *
     * @param \DateTime $dateModification
     *
     * @return Note
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification.
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set eleve.
     *
     * @param \RB\CarnetBundle\Entity\Eleve $eleve
     *
     * @return Note
     */
    public function setEleve(\RB\CarnetBundle\Entity\Eleve $eleve)
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve.
     *
     * @return \RB\CarnetBundle\Entity\Eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }
}
