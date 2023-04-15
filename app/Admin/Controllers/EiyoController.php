<?php

namespace App\Admin\Controllers;

use App\Models\Eiyo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EiyoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Eiyo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Eiyo());
        $grid->model()->where('active_flg', true);

        $grid->column('id', __('Id'));
        $grid->column('active_flg', __('Active flg'));
        $grid->column('food_name', __('Food name'));
        $grid->column('enerc_kcal', __('Enerc kcal'));
        $grid->column('prot', __('Prot'));
        $grid->column('chole', __('Chole'));
        $grid->column('fat', __('Fat'));
        $grid->column('choavlm', __('Choavlm'));
        $grid->column('fib', __('Fib'));
        $grid->column('oa', __('Oa'));
        $grid->column('ash', __('Ash'));
        $grid->column('na', __('Na'));
        $grid->column('k', __('K'));
        $grid->column('ca', __('Ca'));
        $grid->column('mg', __('Mg'));
        $grid->column('p', __('P'));
        $grid->column('fe', __('Fe'));
        $grid->column('zn', __('Zn'));
        $grid->column('cu', __('Cu'));
        $grid->column('mn', __('Mn'));
        $grid->column('se', __('Se'));
        $grid->column('cr', __('Cr'));
        $grid->column('mo', __('Mo'));
        $grid->column('retol', __('Retol'));
        $grid->column('carta', __('Carta'));
        $grid->column('cartb', __('Cartb'));
        $grid->column('crypxb', __('Crypxb'));
        $grid->column('cartbeq', __('Cartbeq'));
        $grid->column('vita_rae', __('Vita rae'));
        $grid->column('vitd', __('Vitd'));
        $grid->column('tocpha', __('Tocpha'));
        $grid->column('tocphb', __('Tocphb'));
        $grid->column('tocphg', __('Tocphg'));
        $grid->column('tocphd', __('Tocphd'));
        $grid->column('vitk', __('Vitk'));
        $grid->column('thia', __('Thia'));
        $grid->column('ribf', __('Ribf'));
        $grid->column('nia', __('Nia'));
        $grid->column('ne', __('Ne'));
        $grid->column('vitb6a', __('Vitb6a'));
        $grid->column('vitb12', __('Vitb12'));
        $grid->column('fol', __('Fol'));
        $grid->column('pantac', __('Pantac'));
        $grid->column('biot', __('Biot'));
        $grid->column('vitc', __('Vitc'));
        $grid->column('alc', __('Alc'));
        $grid->column('nacl_eq', __('Nacl eq'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Eiyo::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('active_flg', __('Active flg'));
        $show->field('food_name', __('Food name'));
        $show->field('enerc_kcal', __('Enerc kcal'));
        $show->field('prot', __('Prot'));
        $show->field('chole', __('Chole'));
        $show->field('fat', __('Fat'));
        $show->field('choavlm', __('Choavlm'));
        $show->field('fib', __('Fib'));
        $show->field('oa', __('Oa'));
        $show->field('ash', __('Ash'));
        $show->field('na', __('Na'));
        $show->field('k', __('K'));
        $show->field('ca', __('Ca'));
        $show->field('mg', __('Mg'));
        $show->field('p', __('P'));
        $show->field('fe', __('Fe'));
        $show->field('zn', __('Zn'));
        $show->field('cu', __('Cu'));
        $show->field('mn', __('Mn'));
        $show->field('se', __('Se'));
        $show->field('cr', __('Cr'));
        $show->field('mo', __('Mo'));
        $show->field('retol', __('Retol'));
        $show->field('carta', __('Carta'));
        $show->field('cartb', __('Cartb'));
        $show->field('crypxb', __('Crypxb'));
        $show->field('cartbeq', __('Cartbeq'));
        $show->field('vita_rae', __('Vita rae'));
        $show->field('vitd', __('Vitd'));
        $show->field('tocpha', __('Tocpha'));
        $show->field('tocphb', __('Tocphb'));
        $show->field('tocphg', __('Tocphg'));
        $show->field('tocphd', __('Tocphd'));
        $show->field('vitk', __('Vitk'));
        $show->field('thia', __('Thia'));
        $show->field('ribf', __('Ribf'));
        $show->field('nia', __('Nia'));
        $show->field('ne', __('Ne'));
        $show->field('vitb6a', __('Vitb6a'));
        $show->field('vitb12', __('Vitb12'));
        $show->field('fol', __('Fol'));
        $show->field('pantac', __('Pantac'));
        $show->field('biot', __('Biot'));
        $show->field('vitc', __('Vitc'));
        $show->field('alc', __('Alc'));
        $show->field('nacl_eq', __('Nacl eq'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Eiyo());

        $form->switch('active_flg', __('Active flg'));
        $form->text('food_name', __('Food name'));
        $form->number('enerc_kcal', __('Enerc kcal'));
        $form->text('prot', __('Prot'));
        $form->text('chole', __('Chole'));
        $form->text('fat', __('Fat'));
        $form->text('choavlm', __('Choavlm'));
        $form->text('fib', __('Fib'));
        $form->text('oa', __('Oa'));
        $form->text('ash', __('Ash'));
        $form->text('na', __('Na'));
        $form->text('k', __('K'));
        $form->text('ca', __('Ca'));
        $form->text('mg', __('Mg'));
        $form->text('p', __('P'));
        $form->text('fe', __('Fe'));
        $form->text('zn', __('Zn'));
        $form->text('cu', __('Cu'));
        $form->text('mn', __('Mn'));
        $form->text('se', __('Se'));
        $form->text('cr', __('Cr'));
        $form->text('mo', __('Mo'));
        $form->text('retol', __('Retol'));
        $form->text('carta', __('Carta'));
        $form->text('cartb', __('Cartb'));
        $form->text('crypxb', __('Crypxb'));
        $form->text('cartbeq', __('Cartbeq'));
        $form->text('vita_rae', __('Vita rae'));
        $form->text('vitd', __('Vitd'));
        $form->text('tocpha', __('Tocpha'));
        $form->text('tocphb', __('Tocphb'));
        $form->text('tocphg', __('Tocphg'));
        $form->text('tocphd', __('Tocphd'));
        $form->text('vitk', __('Vitk'));
        $form->text('thia', __('Thia'));
        $form->text('ribf', __('Ribf'));
        $form->text('nia', __('Nia'));
        $form->text('ne', __('Ne'));
        $form->text('vitb6a', __('Vitb6a'));
        $form->text('vitb12', __('Vitb12'));
        $form->text('fol', __('Fol'));
        $form->text('pantac', __('Pantac'));
        $form->text('biot', __('Biot'));
        $form->text('vitc', __('Vitc'));
        $form->text('alc', __('Alc'));
        $form->text('nacl_eq', __('Nacl eq'));

        return $form;
    }
}
