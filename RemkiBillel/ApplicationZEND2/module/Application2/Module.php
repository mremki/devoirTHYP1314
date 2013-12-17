<?php
 namespace Application2;

 // Add these import statements:
 use Application2\Model\Application2;
 use Application2\Model\Application2Table;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;

 
 class Module
 {
	// getAutoloaderConfig() and getConfig() methods here
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }

     
     // Add this method:
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Application2\Model\Application2Table' =>  function($sm) {
                     $tableGateway = $sm->get('Application2TableGateway');
                     $table = new Application2Table($tableGateway);
                     return $table;
                 },
             'Application2TableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Application2());
                     return new TableGateway('etudiants', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
 }
 

 ?>