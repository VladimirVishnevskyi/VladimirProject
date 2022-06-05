<?php
class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    public function generate($content_view, $template_view, $data = null)
    {
        if (is_array($data)) {

            //преобразуем элементы массива в переменные
            extract($data);
        }

        include 'application/views/'.$template_view;
    }

    public function renderObjects($data)
    {
        include 'render-object.php';
    }

    public function generateForm(Model $model, $values = false){
        $manualInputVars = $model->getManualInputVars();
        $htmlForm = "";
        foreach($manualInputVars as $key => $keyArray){

            $value = ($values === true) ? $keyArray['value'] : '';
            if($keyArray['form'] == 'input'){
                $htmlForm .= "<span>$key:</span><input type='input' name = '$key' placeholder='Enter your $key' value='$value'><br />";
            }
            if($keyArray['form'] == 'checkbox'){
                if($keyArray['value'] == 1) $htmlForm .= "<input type='checkbox' name = '$key' value='1' checked>Есть в наличии<br />";
                else $htmlForm .= "<input type='checkbox' name = '$key' value='1'>Есть в наличии<br />";
            }
        }
        return $htmlForm;
    }



}