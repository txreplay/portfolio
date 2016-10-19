<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Project
 *
 * @ORM\Table(name="projects")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project
{
    use ORMBehaviors\Sluggable\Sluggable,
        ORMBehaviors\Timestampable\Timestampable;

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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255, nullable=true)
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="link_project", type="string", length=255, nullable=true)
     */
    private $linkProject;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    public function __toString()
    {
        return ($this->title)? $this->title : 'New Project';
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return boolean
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param boolean $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Project
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Project
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return string
     */
    public function getLinkProject()
    {
        return $this->linkProject;
    }

    /**
     * @param string $linkProject
     */
    public function setLinkProject($linkProject)
    {
        $this->linkProject = $linkProject;
    }

    ///////////////
    // SLUGGABLE //
    ///////////////
    public function getSluggableFields() { return [ 'title' ]; }
    public function getSlug() { return $this->slug; }
    public function getRegenerateSlugOnUpdate() { return true; }
}

