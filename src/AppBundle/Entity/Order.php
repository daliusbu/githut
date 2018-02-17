<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.13
 * Time: 10.56
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class Order
{

    public function __construct()
    {
        $this->setDate();
    }

    /**
     * @ORM\Column(type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $id;

      /**
     * @ORM\Column(type="string", length=20)
     */

    private $item;

    /**
     * @ORM\Column(type="integer", length=5)
     */
    private $qnt;

    /**
     * @ORM\Column(type="datetime", length=50)
     */
    private $date;

     /**
     * @ORM\Column(type="boolean", length=30, nullable=true)
     */
    private $delivered;

    /**
     * @ORM\Column(type="float", length=20, nullable=true)
     */
    private $price;

     /**
      * @ORM\Column(type="float", length=20, nullable=true)
      */
    private $sum;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders" )
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;



//    -------------- Getters and Setters --------------------
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getQnt()
    {
        return $this->qnt;
    }

    /**
     * @param mixed $qnt
     */
    public function setQnt($qnt)
    {
        $this->qnt = $qnt;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate()
    {
        $this->date = new \DateTime("now");
    }

    /**
     * @return mixed
     */
    public function getDelivered()
    {
        return $this->delivered;
    }

    /**
     * @param mixed $sentOut
     */
    public function setDelivered($delivered)
    {
        $this->delivered = $delivered;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }


}
