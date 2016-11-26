<?php

namespace FormTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use FormTest\Form\MultiSelectForm;

class IndexController extends AbstractActionController {

    public function indexAction() {

        $request = $this->getRequest();

        $form = new MultiSelectForm();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $redir =
                    $this->redirect()->toRoute(
                        'confirmation',
                        [
                            'action' => 'confirmed',
                            'bs' => 5
                        ],
                        [
                            'query' =>
                                [
                                    'name' => $form->get('name')->getValue(),
                                ],
                        ]);
                return $redir;
            }
        }

            return [
                'form' => $form
            ];
        }

    public function confirmAction() {
        $name = $this->params()->fromQuery('name', -1);
        return ['name' => $name];
    }
}
