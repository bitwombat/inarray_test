<?php

namespace FormTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use FormTest\Form\MultiSelectForm;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {

        $request = $this->getRequest();

        $form = new MultiSelectForm();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                return $this->redirect()->toRoute(
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
                    ]
                );
            }
        }

            return [
                'form' => $form
            ];
    }

    public function confirmAction()
    {
        $name = $this->params()->fromQuery('name', -1);
        return ['name' => $name];
    }
}
