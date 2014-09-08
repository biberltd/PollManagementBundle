<?php
/**
 * @name        VotesOfPoll
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
namespace BiberLtd\Bundle\PollManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Core\CoreEntity;
/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="votes_of_poll",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="idx_u_votes_of_poll_id", columns={"id"}),
 *         @ORM\UniqueConstraint(name="idx_u_votes_of_poll", columns={"poll","choice","voter"})
 *     }
 * )
 */
class VotesOfPoll extends CoreEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=20)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="integer", length=20, nullable=false)
     */
    private $voter;

    /** 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $date_voted;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\PollManagementBundle\Entity\Poll", inversedBy="votes")
     * @ORM\JoinColumn(name="poll", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $poll;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\PollManagementBundle\Entity\PollChoice", inversedBy="votes")
     * @ORM\JoinColumn(name="choice", referencedColumnName="id", nullable=false, onDelete="RESTRICT")
     */
    private $poll_choice;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\MemberManagementBundle\Entity\Member")
     * @ORM\JoinColumn(name="member", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $member;
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
     * @name                  setDateVoted ()
     *                                     Sets the date_voted property.
     *                                     Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $date_voted
     *
     * @return          object                $this
     */
    public function setDateVoted($date_voted) {
        if(!$this->setModified('date_voted', $date_voted)->isModified()) {
            return $this;
        }
		$this->date_voted = $date_voted;
		return $this;
    }

    /**
     * @name            getDateVoted ()
     *                               Returns the value of date_voted property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->date_voted
     */
    public function getDateVoted() {
        return $this->date_voted;
    }



    /**
     * @name                  setMember ()
     *                                  Sets the member property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $member
     *
     * @return          object                $this
     */
    public function setMember($member) {
        if(!$this->setModified('member', $member)->isModified()) {
            return $this;
        }
		$this->member = $member;
		return $this;
    }

    /**
     * @name            getMember ()
     *                            Returns the value of member property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->member
     */
    public function getMember() {
        return $this->member;
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
     * @name                  setPollChoice ()
     *                                      Sets the poll_choice property.
     *                                      Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $poll_choice
     *
     * @return          object                $this
     */
    public function setPollChoice($poll_choice) {
        if(!$this->setModified('poll_choice', $poll_choice)->isModified()) {
            return $this;
        }
		$this->poll_choice = $poll_choice;
		return $this;
    }

    /**
     * @name            getPollChoice ()
     *                                Returns the value of poll_choice property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->poll_choice
     */
    public function getPollChoice() {
        return $this->poll_choice;
    }

    /**
     * @name                  setVoter ()
     *                                 Sets the voter property.
     *                                 Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $voter
     *
     * @return          object                $this
     */
    public function setVoter($voter) {
        if(!$this->setModified('voter', $voter)->isModified()) {
            return $this;
        }
		$this->voter = $voter;
		return $this;
    }

    /**
     * @name            getVoter ()
     *                           Returns the value of voter property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->voter
     */
    public function getVoter() {
        return $this->voter;
    }
}
/**
 * Change Log:
 * **************************************
 * v1.0.0                      Murat Ünal
 * 23.09.2013
 * **************************************
 * A getDateVoted()
 * A getId()
 * A getMember()
 * A getPoll()
 * A getPollChoice()
 * A getVoters()
 *
 * A setDateVoted()
 * A setMember()
 * A setPoll()
 * A setPollChoice()
 * A setVoters()
 *
 */