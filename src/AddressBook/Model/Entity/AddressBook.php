<?php
/**
 * AddressBook.php
 *
 * LICENSE: Copyright David White [monkeyphp] <david@monkeyphp.com> http://www.monkeyphp.com/
 *
 * PHP Version 5.3.6
 *
 * @category   AddressBook
 * @package    Model
 * @subpackage Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 * @copyright  2011 David White (c) monkeyphp.com
 * @license    http://www.monkeyphp.com/
 * @version    Revision: ##VERSION##
 * @link       http://www.monkeyphp.com/
 */
namespace AddressBook\Model\Entity;
/**
 * Root aggregate class representing our AddressBook.
 *
 * This class is our root aggregate class representing an AddressBook containing
 * a collection of Contacts. This class exposes methods for retrieving, adding and
 * removing Contacts to and from the AddressBook.
 *
 * @category   AddressBook
 * @package    Model
 * @subpackage Entity
 * @author     David White [monkeyphp] <david@monkeyphp.com>
 * @copyright  2011 David White (c) monkeyphp.com
 * @license    http://www.monkeyphp.com/
 * @version    Release: ##VERSION##
 * @link       http://www.monkeyphp.com/
 */
class AddressBook
{

    /**
     * Universally unique id
     *
     * @access protected
     * @var    string
     */
    protected $uuid;

    /**
     * Title of the AddressBook
     *
     * @access protected
     * @var    string
     */
    protected $title;

    /**
     * The description of the AddressBook
     *
     * @access protected
     * @var    string
     */
    protected $description;

    /**
     * The slug of the AddressBook
     *
     * @access protected
     * @var    string
     */
    protected $slug;

    /**
     * Created DateTime
     *
     * @access protected
     * @var    DateTime
     */
    protected $created;

    /**
     * Modified DateTime
     *
     * @access protected
     * @var    DateTime
     */
    protected $modified;

    /**
     * Instance of ContactCollection containing instances of
     * Contact that can be lazy loaded
     *
     * @access protected
     * @var    AddressBook\Model\Collection\ContactCollection
     */
    protected $contacts;

    /**
     * Constructor
     *
     * @access public
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Return the Uuid property of the AddressBook
     *
     * @access public
     * @return string|null
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set the Uuid property of the AddressBook
     *
     * Constraint 23 characters
     *
     * @param string $uuid The value to set the AddressBook Uuid to
     *
     * @access public
     * @throws \InvalidArgumentException
     * @return \AddressBook\Model\Entity\AddressBook
     */
    public function setUuid($uuid = null)
    {
        if (! is_null($uuid)) {
            if (! is_string($uuid)) {
                throw new \InvalidArgumentException(__METHOD__ . ' expects a string');
            }
            if (strlen($uuid) !== 23) {
                throw new \InvalidArgumentException(__METHOD__ . ' expects a string of 23 characters');
            }
        }
        $this->uuid = $uuid;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title property of the AddressBook
     * 
     * @param string $title The value to set the title property to
     *
     * @access public
     * @throws \InvalidArgumentException
     * @return \AddressBook\Model\Entity\AddressBook
     */
    public function setTitle($title = null)
    {
        if (! is_null($title)) {
            if (! is_string($title)) {
                throw new \InvalidArgumentException(__METHOD__ . ' expects a string');
            }
            if (strlen($title) > 255) {
                throw new \InvalidArgumentException(__METHOD__ . ' expects a string no moere than 255 characters');
            }
        }
        $this->title = $title;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
        return $this;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified(DateTime $modified)
    {
        $this->modified = $modified;
        return $this;
    }


    /**
     * Return an instance of ContactCollection containing all Contact instances
     * that have been added to this AddressBook
     *
     * If not previously set, this method will create an instance of AddressBook\Model\Collection\ContactCollection
     * be default and return that
     *
     * @access public
     * @return AddressBook\Model\Collection\ContactCollection
     */
    public function getContacts()
    {
        if (! isset($this->contacts)) {
            $this->contacts = new AddressBook\Model\Collection\ContactCollection();
        }
        return $this->contacts;
    }

    /**
     * Set the Collection of Contact instances
     *
     * @param \AddressBook\Model\Entity\AddressBook\Model\Collection\ContactCollectionInterface $contactCollectionInterface
     *
     * @access public
     * @return \AddressBook\Model\Entity\AddressBook
     */
    public function setContacts(AddressBook\Model\Collection\ContactCollectionInterface $contactCollectionInterface)
    {
        $this->contacts = $contactCollectionInterface;
        return $this;
    }

    /**
     * Add an instance of ContactInterface to this AddressBook
     *
     * @param \AddressBook\Model\Entity\AddressBook\Model\Entity\ContactInterface $contactInterface
     *
     * @access public
     * @return \AddressBook\Model\Entity\AddressBook
     */
    public function addContact(AddressBook\Model\Entity\ContactInterface $contactInterface)
    {
        if (! $this->getContacts()->contains($contactInterface)) {
            $this->getContacts()->add($contactInterface);
        }
        return $this;
    }

    /**
     * Return a Collection instance containing __all__ instances
     * of Contact that belong to this AddressBook
     *
     * @access public
     * @return AddressBook\Model\Entity\Collection\ContactCollection
     */
    public function fetchContacts()
    {
        return $this->contacts;
    }

    /**
     * Return a Contact instance based on the supplied id paramter
     *
     * @param int $id The id of the Contact to return
     *
     * @access public
     * @return AddressBook\Model\Entity\Contact|null
     */
    public function findContactById($id)
    {
        return $this->getContacts()->findContactById($id);
    }

    /**
     * Return a Contact instance based on the supplied Uuid parameter
     *
     * @param string $uuid The Uuid of the Contact to return
     *
     * @access public
     * @return AddressBook\Model\Entity\Contact|null
     */
    public function findContactByUuid($uuid)
    {
        return $this->getContacts()->findContactByUuid($uuid);
    }

    /**
     * Return a Contact instance based on the supplied slug parameter
     *
     * @param string $slug The slug of the Contact to return
     *
     * @access public
     * @return AddressBook\Model\Entity\Contact|null
     */
    public function findContactBySlug($slug)
    {
        return $this->getContacts()->findContactBySlug($slug);
    }

}