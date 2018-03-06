<?php
namespace App\Http\ViewComposers;


use Illuminate\View\View;
use App\Helper\MajorHelper;
use App\Helper\CultureHelper;
use App\Helper\DegreeHelper;

class TeacherEducationComposer
{
    public function compose(View $view){
        $view->with('majorArr', MajorHelper::getMajorType());
        $view->with("cultureArr", CultureHelper::getCultureType());
        $view->with("degreeArr", DegreeHelper::getDegreeType());
    }
}