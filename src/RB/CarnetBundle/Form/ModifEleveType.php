<?php

namespace RB\CarnetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifEleveType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return AjoutEleveType::class;
    }
}
