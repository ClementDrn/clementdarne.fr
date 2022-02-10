<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $version;

    /**
     * @ORM\Column(type="boolean")
     */
    private $released;

    /**
     * @ORM\Column(type="date")
     */
    private $start_year;

    /**
     * @ORM\Column(type="date")
     */
    private $end_year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $presentation;
}
