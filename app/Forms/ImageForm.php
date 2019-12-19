<?php

namespace App\Forms;

use App\Category;
use Kris\LaravelFormBuilder\Form;

class ImageForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('description','textarea')
            ->add('category_id', 'entity', [
                'class' => 'App\Category',
                'property' => 'name',
                'query_builder' => function (Category $category) {
                    // If query builder option is not provided, all data is fetched
                    return $category::all();
                }
            ])
            ->add('cover_image', 'file')
            ->add('submit', 'submit', ['label' => 'Save form']);
    }
}
