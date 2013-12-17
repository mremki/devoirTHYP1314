<?php
 namespace Application2\Controller;
 
 use Zend\View\Model\JsonModel;
 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Application2\Model\Application2;
 use Application2\Form\Application2Form;


 class Application2Controller extends AbstractActionController
 {
	 protected $application2Table;
     // module/Application2/src/Application2/Controller/Application2Controller.php:
     public function indexAction()
     {
         return new ViewModel(array(
             'application2s' => $this->getApplication2Table()->fetchAll(),
         ));
     }
	 // ...

	public function addAction()
     {
         $form = new Application2Form();
         $form->get('submit')->setValue('Ajouter une personne');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $application2 = new Application2();
             $form->setInputFilter($application2->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $application2->exchangeArray($form->getData());
                 $this->getApplication2Table()->saveApplication2($application2);

                 // Redirect to list of application2s
                 return $this->redirect()->toRoute('application2');
             }
         }
         return array('form' => $form);
     }
	
     public function editAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('application2', array(
                 'action' => 'add'
             ));
         }

         // Get the Application2 with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $application2 = $this->getApplication2Table()->getApplication2($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('application2', array(
                 'action' => 'index'
             ));
         }

         $form  = new Application2Form();
         $form->bind($application2);
         $form->get('submit')->setAttribute('value', 'Editer');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($application2->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getApplication2Table()->saveApplication2($application2);

                 // Redirect to list of application2s
                 return $this->redirect()->toRoute('application2');
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );
     }
	 
	 
	 
	 // Add content to the following method:
     public function deleteAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('application2');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'Non');

             if ($del == 'Oui') {
                 $id = (int) $request->getPost('id');
                 $this->getApplication2Table()->deleteApplication2($id);
             }

             // Redirect to list of application2s
             return $this->redirect()->toRoute('application2');
         }

         return array(
             'id'    => $id,
             'application2' => $this->getApplication2Table()->getApplication2($id)
         );
     }
	 public function suppAction(){
		$id = (int) $this->params()->fromRoute('id', 0);
		$this->getApplication2Table()->deleteApplication2($id);
		$result = new JsonModel(array(
				'success'=>true,
			));
			return $result;
     } 
	 
	
	 public function modifAction(){
		
		$id = (int) $this->params()->fromRoute('id', 0);

         // Get the Application2 with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $application2 = $this->getApplication2Table()->getApplication2($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('application2', array(
                 'action' => 'index'
             ));
         }

		return $result;
     }
	 

	 public function getApplication2Table()
     {
         if (!$this->application2Table) {
             $sm = $this->getServiceLocator();
             $this->application2Table = $sm->get('Application2\Model\Application2Table');
         }
         return $this->application2Table;
     }

 }
 
?>