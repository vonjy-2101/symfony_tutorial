<?php

namespace Voiture\ListeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * voiture
 *
 * @ORM\Table(name="voiture")
 * @ORM\Entity(repositoryClass="Voiture\ListeBundle\Repository\voitureRepository")
 */
class voiture
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
     * @var int
     *
     * @ORM\Column(name="id_marque", type="integer")
     */
    private $idMarque;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     *
     * @ORM\ManyToOne(targetEntity="marque")
     * @ORM\JoinColumn(name="id",referencedColumnName="id_marque",onDelete="CASCADE")
     */
    private $marque;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idMarque
     *
     * @param integer $idMarque
     *
     * @return voiture
     */
    public function setIdMarque($idMarque)
    {
        $this->idMarque = $idMarque;

        return $this;
    }

    /**
     * Get idMarque
     *
     * @return int
     */
    public function getIdMarque()
    {
        return $this->idMarque;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return voiture
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }
}

