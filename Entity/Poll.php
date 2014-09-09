<?php
/**
 * @name        Poll
 * @package		BiberLtd\Bundle\CoreBundle\PollManagementBundle
 *
 * @author		Murat Ünal
 *
 * @version     1.0.1
 * @date        11.10.2013
 *
 * @copyright   Biber Ltd. (http://www.biberltd.com)
 * @license     GPL v3.0
 *
 * @description Model / Entity class.
 *
 */
namespace BiberLtd\Bundle\PollManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Bundle\CoreBundle\CoreLocalizableEntity;
/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="poll",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={
 *         @ORM\Index(name="idx_n_poll_date_added", columns={"id"}),
 *         @ORM\Index(name="idx_n_poll_date_published", columns={"date_published"}),
 *         @ORM\Index(name="idx_n_poll_date_unpublished", columns={"date_unpublished"})
 *     },
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_poll_id", columns={"id"})}
 * )
 */
class Poll extends CoreLocalizableEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    public $date_added;

    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_published;

    /** 
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_unpublished;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_voters;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_votes;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_view;

    /** 
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    private $select_mode;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $max_votes;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\PollManagementBundle\Entity\PollLocalization",
     *     mappedBy="poll"
     * )
     */
    protected $localizations;

    /** 
     * @ORM\OneToMany(targetEntity="BiberLtd\Bundle\PollManagementBundle\Entity\PollChoice", mappedBy="poll")
     */
    private $choices;

    /** 
     * @ORM\OneToMany(targetEntity="BiberLtd\Bundle\PollManagementBundle\Entity\VotesOfPoll", mappedBy="poll")
     */
    private $votes;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\SiteManagementBundle\Entity\Site")
     * @ORM\JoinColumn(name="site", referencedColumnName="id", onDelete="CASCADE")
     */
    private $site;
    /******************************************************************
     * PUBLIC SET AND GET FUNCTIONS                                   *
     ******************************************************************/

    /**
     * @name            getId()
     *  				Gets $id property.
     * .
     * @author          Murat Ünal
     * @since			1.0.0
     * @version         1.0.0
     *
     * @return          string          $this->id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @name                  setChoices ()
     *                                   Sets the choices property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $choices
     *
     * @return          object                $this
     */
    public function setChoices($choices) {
        if(!$this->setModified('choices', $choices)->isModified()) {
            return $this;
        }
		$this->choices = $choices;
		return $this;
    }

    /**
     * @name            getChoices ()
     *                             Returns the value of choices property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->choices
     */
    public function getChoices() {
        return $this->choices;
    }

    /**
     * @name                  setCountView ()
     *                                     Sets the count_view property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_view
     *
     * @return          object                $this
     */
    public function setCountView($count_view) {
        if(!$this->setModified('count_view', $count_view)->isModified()) {
            return $this;
        }
		$this->count_view = $count_view;
		return $this;
    }

    /**
     * @name            getCountView ()
     *                               Returns the value of count_view property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_view
     */
    public function getCountView() {
        return $this->count_view;
    }

    /**
     * @name                  setCountVoters ()
     *                                       Sets the count_voters property.
     *                                       Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_voters
     *
     * @return          object                $this
     */
    public function setCountVoters($count_voters) {
        if(!$this->setModified('count_voters', $count_voters)->isModified()) {
            return $this;
        }
		$this->count_voters = $count_voters;
		return $this;
    }

    /**
     * @name            getCountVoters ()
     *                                 Returns the value of count_voters property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_voters
     */
    public function getCountVoters() {
        return $this->count_voters;
    }

    /**
     * @name                  setCountVotes ()
     *                                      Sets the count_votes property.
     *                                      Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_votes
     *
     * @return          object                $this
     */
    public function setCountVotes($count_votes) {
        if(!$this->setModified('count_votes', $count_votes)->isModified()) {
            return $this;
        }
		$this->count_votes = $count_votes;
		return $this;
    }

    /**
     * @name            getCountVotes ()
     *                                Returns the value of count_votes property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_votes
     */
    public function getCountVotes() {
        return $this->count_votes;
    }

    /**
     * @name                  setDatePublished ()
     *                                         Sets the date_published property.
     *                                         Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_published
     *
     * @return          object                $this
     */
    public function setDatePublished($date_published) {
        if(!$this->setModified('date_published', $date_published)->isModified()) {
            return $this;
        }
		$this->date_published = $date_published;
		return $this;
    }

    /**
     * @name            getDatePublished ()
     *                                   Returns the value of date_published property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_published
     */
    public function getDatePublished() {
        return $this->date_published;
    }

    /**
     * @name                  setDateUnpublished ()
     *                                           Sets the date_unpublished property.
     *                                           Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_unpublished
     *
     * @return          object                $this
     */
    public function setDateUnpublished($date_unpublished) {
        if(!$this->setModified('date_unpublished', $date_unpublished)->isModified()) {
            return $this;
        }
		$this->date_unpublished = $date_unpublished;
		return $this;
    }

    /**
     * @name            getDateUnpublished ()
     *                                     Returns the value of date_unpublished property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_unpublished
     */
    public function getDateUnpublished() {
        return $this->date_unpublished;
    }

    /**
     * @name                  setMaxVotes ()
     *                                    Sets the max_votes property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $max_votes
     *
     * @return          object                $this
     */
    public function setMaxVotes($max_votes) {
        if(!$this->setModified('max_votes', $max_votes)->isModified()) {
            return $this;
        }
		$this->max_votes = $max_votes;
		return $this;
    }

    /**
     * @name            getMaxVotes ()
     *                              Returns the value of max_votes property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->max_votes
     */
    public function getMaxVotes() {
        return $this->max_votes;
    }

    /**
     * @name                  setSelectMode ()
     *                                      Sets the select_mode property.
     *                                      Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $select_mode
     *
     * @return          object                $this
     */
    public function setSelectMode($select_mode) {
        if(!$this->setModified('select_mode', $select_mode)->isModified()) {
            return $this;
        }
		$this->select_mode = $select_mode;
		return $this;
    }

    /**
     * @name            getSelectMode ()
     *                                Returns the value of select_mode property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->select_mode
     */
    public function getSelectMode() {
        return $this->select_mode;
    }

    /**
     * @name                  setSite ()
     *                                Sets the site property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $site
     *
     * @return          object                $this
     */
    public function setSite($site) {
        if(!$this->setModified('site', $site)->isModified()) {
            return $this;
        }
		$this->site = $site;
		return $this;
    }

    /**
     * @name            getSite ()
     *                          Returns the value of site property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->site
     */
    public function getSite() {
        return $this->site;
    }

    /**
     * @name                  setVotes ()
     *                                 Sets the votes property.
     *                                 Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $votes
     *
     * @return          object                $this
     */
    public function setVotes($votes) {
        if(!$this->setModified('votes', $votes)->isModified()) {
            return $this;
        }
		$this->votes = $votes;
		return $this;
    }

    /**
     * @name            getVotes ()
     *                           Returns the value of votes property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->votes
     */
    public function getVotes() {
        return $this->votes;
    }
}
/**
 * Change Log:
 * * * **********************************
 * v1.0.1                      Murat Ünal
 * 11.10.2013
 * **************************************
 * A getLocalizations()
 * A setLocalizations()
 * * ************************************
 * v1.0.1                      Murat Ünal
 * 11.10.2013
 * **************************************
 * D get_localization()
 * D set_localization()
 * **************************************
 * v1.0.0                      Murat Ünal
 * 23.09.2013
 * **************************************
 * A getChoices()
 * A getCountView()
 * A getCountVoters()
 * A getCountVotes()
 * A getDateAdded()
 * A getDatePublished()
 * A getDateUnpublished()
 * A getId()
 * A get_localization()
 * A getMaxVotes()
 * A getSelectMode()
 *
 * A setChoices()
 * A setCountView()
 * A setCountVoters()
 * A setCountVotes()
 * A setDateAdded()
 * A setDatePublished()
 * A setDateUnpublished()
 * A set_localization()
 * A setMaxVotes()
 * A setSelectMode()
 *
 */