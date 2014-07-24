<?php
/**
 * @name        PollChoice
 * @package		BiberLtd\Core\PollManagementBundle
 *
 * @author		Murat Ünal
 *
 * @version     1.0.0
 * @date        23.09.2013
 *
 * @copyright   Biber Ltd. (http://www.biberltd.com)
 * @license     GPL v3.0
 *
 * @description Model / Entity class.
 *
 */
namespace BiberLtd\Core\Bundles\PollManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Core\CoreLocalizableEntity;
/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="poll_choice",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_poll_choice_id", columns={"id"})}
 * )
 */
class PollChoice extends CoreLocalizableEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="integer", length=10, nullable=false)
     */
    private $count_vote;

    /** 
     * @ORM\Column(type="decimal", length=4, nullable=false)
     */
    private $ratio_vote;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Core\Bundles\PollManagementBundle\Entity\PollChoiceLocalization",
     *     mappedBy="poll_choice"
     * )
     */
    protected $localizations;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Core\Bundles\PollManagementBundle\Entity\VotesOfPoll",
     *     mappedBy="poll_choice"
     * )
     */
    private $votes;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\PollManagementBundle\Entity\Poll", inversedBy="choices")
     * @ORM\JoinColumn(name="poll", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $poll;
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
     * @name                  setCountVote ()
     *                                     Sets the count_vote property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $count_vote
     *
     * @return          object                $this
     */
    public function setCountVote($count_vote) {
        if(!$this->setModified('count_vote', $count_vote)->isModified()) {
            return $this;
        }
		$this->count_vote = $count_vote;
		return $this;
    }

    /**
     * @name            getCountVote ()
     *                               Returns the value of count_vote property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->count_vote
     */
    public function getCountVote() {
        return $this->count_vote;
    }

    /**
     * @name                  setPoll ()
     *                                Sets the poll property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $poll
     *
     * @return          object                $this
     */
    public function setPoll($poll) {
        if(!$this->setModified('poll', $poll)->isModified()) {
            return $this;
        }
		$this->poll = $poll;
		return $this;
    }

    /**
     * @name            getPoll ()
     *                          Returns the value of poll property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->poll
     */
    public function getPoll() {
        return $this->poll;
    }

    /**
     * @name                  setRatioVote ()
     *                                     Sets the ratio_vote property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $ratio_vote
     *
     * @return          object                $this
     */
    public function setRatioVote($ratio_vote) {
        if(!$this->setModified('ratio_vote', $ratio_vote)->isModified()) {
            return $this;
        }
		$this->ratio_vote = $ratio_vote;
		return $this;
    }

    /**
     * @name            getRatioVote ()
     *                               Returns the value of ratio_vote property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->ratio_vote
     */
    public function getRatioVote() {
        return $this->ratio_vote;
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
 * **************************************
 * v1.0.0                      Murat Ünal
 * 23.09.2013
 * **************************************
 * A getCountVote()
 * A getId()
 * A getLocalizations()
 * A getPoll()
 * A getRatioVote()
 * A getVotes()
 *
 * A setCountVote()
 * A setLocalizations()
 * A setPoll()
 * A setRatioVote()
 * A setVotes()
 *
 */