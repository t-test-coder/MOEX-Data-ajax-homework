<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Entity\Homework;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UpdateCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'data:update';
    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
      $this->setDescription('Database update.')
           ->setHelp('This command is update your database')
           ->addArgument('file', InputArgument::REQUIRED, 'Datafile');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

      $em = $this->container->get('doctrine')->getManager();
      $dt = $this->container->get('doctrine')->getRepository('App:Homework')->getAllData();

      foreach ($dt as $val) {
        $em->remove($val);
        $em->flush();
      }

//      $output->writeln('Deleted');
///
      $dir = realpath(__DIR__ . '/../../public');
      $data = simplexml_load_file($dir.'\\'.$input->getArgument('file'));
      foreach ($data as $val) {
          $db = new Homework();
          $db->setShortname($val->attributes()->SHORTNAME);
          $db->setLast($val->attributes()->LAST);
          $db->setChangeonday($val->attributes()->CHANGE);
          $db->setVoltoday($val->attributes()->VOLTODAY);
          $db->setSystime($val->attributes()->SYSTIME);

          if($db->getShortname() !== null) {
            $em->persist($db);
            $em->flush();
          }

      }

      $output->writeln('Updated');

      return 0;
    }

  }

?>
