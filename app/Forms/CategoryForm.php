<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use App\Category;
class CategoryForm extends Form
{
    public function buildForm()
    {
        $this
        ->add('name', 'text')
        ->add('description', 'textarea')
        ->add('parent_id', 'entity', [
            'class' => 'App\Category',
            'property' => 'name',
            'query_builder' => function (Category $category) {
                // If query builder option is not provided, all data is fetched
                return $category::all();
            }
        ])
        ->add('submit', 'submit', ['label' => 'Save form']);
    }
}
