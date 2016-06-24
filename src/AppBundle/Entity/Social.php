<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Social
 *
 * @ORM\Table(name="socials")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SocialRepository")
 */
class Social
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
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    /**
     * @var string
     *
     * @ORM\Column(name="social_network", type="string", length=255)
     */
    private $socialNetwork;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_url", type="string", length=255)
     */
    private $profileUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="social_icon", type="string", length=255)
     */
    private $socialIcon;


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
     * Set socialNetwork
     *
     * @param string $socialNetwork
     *
     * @return Social
     */
    public function setSocialNetwork($socialNetwork)
    {
        $this->socialNetwork = $socialNetwork;

        return $this;
    }

    /**
     * Get socialNetwork
     *
     * @return string
     */
    public function getSocialNetwork()
    {
        return $this->socialNetwork;
    }

    /**
     * Set profileUrl
     *
     * @param string $profileUrl
     *
     * @return Social
     */
    public function setProfileUrl($profileUrl)
    {
        $this->profileUrl = $profileUrl;

        return $this;
    }

    /**
     * Get profileUrl
     *
     * @return string
     */
    public function getProfileUrl()
    {
        return $this->profileUrl;
    }

    /**
     * Set socialIcon
     *
     * @param string $socialIcon
     *
     * @return Social
     */
    public function setSocialIcon($socialIcon)
    {
        $this->socialIcon = $socialIcon;

        return $this;
    }

    /**
     * Get socialIcon
     *
     * @return string
     */
    public function getSocialIcon()
    {
        return $this->socialIcon;
    }
}

