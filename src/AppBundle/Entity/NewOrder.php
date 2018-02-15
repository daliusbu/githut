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
 * @ORM\Table(name="newOrder")
 */
class NewOrder
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
     * @ORM\Column(type="string", length=50)
     *
     */
    private $customerId;

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
    private $sentOut;

    /**
     * @ORM\Column(type="float", length=20, nullable=true)
     */
    private $price;

     /**
      * @ORM\Column(type="float", length=20, nullable=true)
      */
    private $sum;


    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
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
    public function getSentOut()
    {
        return $this->sentOut;
    }

    /**
     * @param mixed $sentOut
     */
    public function setSentOut($sentOut)
    {
        $this->sentOut = $sentOut;
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


}
