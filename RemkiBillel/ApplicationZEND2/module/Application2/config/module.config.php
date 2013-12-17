<?php

return array(
     'controllers' => array(
         'invokables' => array(
             'Application2\Controller\Application2' => 'Application2\Controller\Application2Controller',
         ),
     ),
	 // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'application2' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/application2[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Application2\Controller\Application2',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
	 
     'view_manager' => array(
         'template_path_stack' => array(
             'application2' => __DIR__ . '/../view',
         ),
		 'strategies' => array (
			'ViewJsonStrategy'
		),
     ),
 );

?>