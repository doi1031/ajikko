<?php

namespace App\Admin\Controllers;

use App\Models\AjikkoRecipe;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AjjikoRecipeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AjikkoRecipe';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AjikkoRecipe());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('how_many', __('How many'));
        $grid->column('source_url', __('Source url'));
        $grid->column('food_image_url', __('Food image url'));
        $grid->column('medium_image_url', __('Medium image url'));
        $grid->column('small_image_url', __('Small image url'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(AjikkoRecipe::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('how_many', __('How many'));
        $show->field('source_url', __('Source url'));
        $show->field('food_image_url', __('Food image url'));
        $show->field('medium_image_url', __('Medium image url'));
        $show->field('small_image_url', __('Small image url'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new AjikkoRecipe());

        $form->text('title', __('Title'));
        $form->text('description', __('Description'));
        $form->decimal('how_many', __('How many'));
        $form->text('source_url', __('Source url'));
        $form->text('food_image_url', __('Food image url'));
        $form->text('medium_image_url', __('Medium image url'));
        $form->text('small_image_url', __('Small image url'));

        return $form;
    }
}
