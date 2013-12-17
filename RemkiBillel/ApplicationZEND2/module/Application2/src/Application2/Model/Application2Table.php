<?php
namespace Application2\Model;

use Zend\Db\TableGateway\TableGateway;

 class Application2Table
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getApplication2($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveApplication2(Application2 $application2)
     {
         $data = array(
             'prenom' => $application2->prenom,
             'nom'  => $application2->nom,
			 'note'  => $application2->note,
			 'exercices'  => $application2->exercices,
         );

         $id = (int) $application2->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getApplication2($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Application2 id does not exist');
             }
         }
     }

     public function deleteApplication2($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }
 
?>