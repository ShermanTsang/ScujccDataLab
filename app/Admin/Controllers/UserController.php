<?php

namespace App\Admin\Controllers;

use App\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('用户');
            $content->description('信息查看');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('修改用户');
            $content->description('');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('添加用户');
            $content->description('');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->model()->orderBy('id', 'asc');
            $grid->id('ID')->sortable();
            $grid->stuId('学号')->sortable();
            $grid->stuName('姓名')->sortable();
            $grid->stuIdentityCard('身份证')->sortable();
            $grid->loginIP('IP')->sortable();
            $grid->loginTime('登陆时间')->sortable();
            $grid->loginCounts('登陆次数')->sortable();
            $grid->shareCounts('分享次数')->sortable();

            $grid->filter(function ($filter) {
                $filter->useModal();
                $filter->disableIdFilter();
                $filter->like('stuId', '用户编号');
                $filter->like('stuName', '用户名称');
                $filter->like('loginIP', '登陆IP');
            });

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {
            $form->display('id');
            $form->text('stuId', '用户ID');
            $form->text('stuName', '用户名');
            $form->text('stuIdentityCard', '身份证');
            $form->text('loginIP', '登陆IP');
            $form->text('loginCounts', '登陆次数');
            $form->text('shareCounts', '分享次数');
            $form->datetime('loginTime', '登陆时间');
        });
    }
}
