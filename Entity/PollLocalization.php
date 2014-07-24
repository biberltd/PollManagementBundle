<?php
/**
 * @name        PollChoiceLocalization
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
use BiberLtd\Core\CoreEntity;
/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="poll_localization",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={@ORM\Index(name="idx_u_poll_localization_url_key", columns={"language","url_key"})},
 *     uniqueConstraints={@ORM\UniqueConstraint(name="idx_u_poll_localization", columns={"poll","language"})}
 * )
 */
class PollLocalization extends CoreEntity
{
    /** 
     * @ORM\Column(type="string", length=160, nullable=false)
     */
    private $question;

    /** 
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $url_key;

    /** 
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /** 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="BiberLtd\Core\Bundles\MultiLanguageSupportBundle\Entity\Language")
     * @ORM\JoinColumn(name="language", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $language;

    /** 
     * @ORM\Id
     * @ORM\ManyToOne(
     *     targetEntity="BiberLtd\Core\Bundles\PollManagementBundle\Entity\Poll",
     *     inversedBy="localizations"
     * )
     * @ORM\JoinColumn(name="poll", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $poll;

    /**
     * @name                  setDescription ()
     *                                       Sets the description property.
     *                                       Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $description
     *
     * @return          object                $this
     */
    public function setDescription($description) {
        if(!$this->setModified('description', $description)->isModified()) {
            return $this;
        }
		$this->description = $description;
		return $this;
    }

    /**
     * @name            getDescription ()
     *                                 Returns the value of description property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @name                  setLanguage ()
     *                                    Sets the language property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $language
     *
     * @return          object                $this
     */
    public function setLanguage($language) {
        if(!$this->setModified('language', $language)->isModified()) {
            return $this;
        }
		$this->language = $language;
		return $this;
    }

    /**
     * @name            getLanguage ()
     *                              Returns the value of language property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->language
     */
    public function getLanguage() {
        return $this->language;
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
     * @name                  setQuestion ()
     *                                    Sets the question property.
     *                                    Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $question
     *
     * @return          object                $this
     */
    public function setQuestion($question) {
        if(!$this->setModified('question', $question)->isModified()) {
            return $this;
        }
		$this->question = $question;
		return $this;
    }

    /**
     * @name            getQuestion ()
     *                              Returns the value of question property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->question
     */
    public function getQuestion() {
        return $this->question;
    }

    /**
     * @name                  setUrlKey ()
     *                                  Sets the url_key property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $url_key
     *
     * @return          object                $this
     */
    public function setUrlKey($url_key) {
        if(!$this->setModified('url_key', $url_key)->isModified()) {
            return $this;
        }
		$this->url_key = $url_key;
		return $this;
    }

    /**
     * @name            getUrlKey ()
     *                            Returns the value of url_key property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->url_key
     */
    public function getUrlKey() {
        return $this->url_key;
    }
    /******************************************************************
     * PUBLIC SET AND GET FUNCTIONS                                   *
     ******************************************************************/

}
/**
 * Change Log:
 * **************************************
 * v1.0.0                      Murat Ünal
 * 23.09.2013
 * **************************************
 * A getDescription()
 * A getLanguage()
 * A getPoll()
 * A getQuestion()
 * A getUrlKey()
 *
 * A setDescription()
 * A setLanguage()
 * A setPoll()
 * A setQuestion()
 * A setUrlKey()
 *
 */