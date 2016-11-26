<?php

namespace FormTest\Form;

use Zend\Form\Form;


class MultiSelectForm extends Form {

    public function __construct($name = null) {
        parent::__construct($name);

        $this->add([
            'name' => 'name',
            'type' => 'text',
            'attributes'    => [
                'class'         => 'form-control',
            ],
            'options' => [
               'label' => 'Stud Name',
            ]
        ]);
        $this->add([
            'name'          => 'subscriptions',
            'type'          => 'select',
            'options'       => [
                'label'         => 'Subscription/s',
                'unselected_value' => 'Subscription',
                'value_options' => ['one', 'two', 'three']
            ],
            'attributes'    => [
                'multiple'  => 'true',
                'autofocus' => 'autofocus',
                'class'     => 'form-control',
            ],
        ]);
        $this->add([
            'name' => 'go',
            'type' => 'submit',
            'attributes'    => [
                'value'         => 'Save',
                'class'         => 'form-control btn btn-primary',
            ],
        ]);
    }

}