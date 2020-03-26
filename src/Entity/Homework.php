<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Entity\Repository\DataRepository")
 * @ORM\Table(name="data")
 * @ORM\HasLifecycleCallbacks()
 */
class Homework
{
  /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
  protected $id;

  /**
   * @ORM\Column(type="string")
   */
  protected $shortname;

   /**
    * @ORM\Column(type="float")
    */
  protected $last;

   /**
    * @ORM\Column(type="float")
    */
  protected $changeonday;

   /**
    * @ORM\Column(type="bigint", length=255)
    */
  protected $voltoday;

   /**
    * @ORM\Column(type="text")
    */
  protected $systime;


  public function getId()
  {
     return $this->id;
  }

//shortname
  public function getShortname() {
    return $this->shortname;
  }

  public function setShortname($shortname)
  {
     $this->shortname = $shortname;
  }

//last
  public function getLast() {
     return $this->last;
  }

  public function setLast($last)
  {
      $this->last = $last;
  }

//changeonday
  public function getChangeonday() {
     return $this->changeonday;
  }

  public function setChangeonday($changeonday)
  {
      $this->changeonday = $changeonday;
  }

//voltoday
  public function getVoltoday() {
     return $this->changeonday;
  }

  public function setVoltoday($voltoday)
  {
      $this->voltoday = $voltoday;
  }

//systime
  public function getSystime() {
     return $this->systime;
  }

  public function setSystime($systime)
  {
      $this->systime = $systime;
  }
}
?>
