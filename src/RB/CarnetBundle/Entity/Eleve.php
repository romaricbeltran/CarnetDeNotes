<?php

namespace RB\CarnetBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass="RB\CarnetBundle\Repository\EleveRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Eleve
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\OneToMany(targetEntity="RB\CarnetBundle\Entity\Note", mappedBy="eleve")
     */
    private $notes;

    /**
     *
     * @ORM\Column(name="nb_notes", type="integer")
     */
    private $nbNotes = 0;

    /**
     * @var float|null
     *
     * @ORM\Column(name="moyenne_generale", type="float", nullable=true)
     */
    private $moyenneGenerale;

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

    /*
     * Construct.
     *
     * 
     * @iniitalise la date du jour
     */
    public function __construct()
    {
        $this->dateCreation = new \Datetime();
        $this->notes = new ArrayCollection();
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDateModification()
    {
        $this->setDateModification(new \Datetime());
    }

    public function increaseNote()
    {
        $this->nbNotes++;
    }
    
    public function decreaseNote()
    {
        $this->nbNotes--;
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
     * Set nom.
     *
     * @param string $nom
     *
     * @return Eleve
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Eleve
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance.
     *
     * @param \DateTime $dateNaissance
     *
     * @return Eleve
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance.
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set moyenneGenerale.
     *
     * @param float|null $moyenneGenerale
     *
     * @return Eleve
     */
    public function setMoyenneGenerale($moyenneGenerale = null)
    {
        $this->moyenneGenerale = $moyenneGenerale;

        return $this;
    }

    /**
     * Get moyenneGenerale.
     *
     * @return float|null
     */
    public function getMoyenneGenerale()
    {
        return $this->moyenneGenerale;
    }

    /**
     * Set dateCreation.
     *
     * @param \DateTime $dateCreation
     *
     * @return Eleve
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
     * @return Eleve
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
     * Set nbNotes.
     *
     * @param int $nbNotes
     *
     * @return Eleve
     */
    public function setNbNotes($nbNotes)
    {
        $this->nbNotes = $nbNotes;

        return $this;
    }

    /**
     * Get nbNotes.
     *
     * @return int
     */
    public function getNbNotes()
    {
        return $this->nbNotes;
    }

    /**
     * Add note.
     *
     * @param \RB\CarnetBundle\Entity\Note $note
     *
     * @return Eleve
     */
    public function addNote(\RB\CarnetBundle\Entity\Note $note)
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Remove note.
     *
     * @param \RB\CarnetBundle\Entity\Note $note
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeNote(\RB\CarnetBundle\Entity\Note $note)
    {
        return $this->notes->removeElement($note);
    }

    /**
     * Get notes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
