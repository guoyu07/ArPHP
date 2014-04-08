<?php
namespace Components\Format;

class ArFormat extends \Components\Component {
    static public $config = array();

    public function timeToDate($obj, $key = '')
    {
        if (is_array($obj)) :
            if (empty($obj[$key])) :
                foreach ($obj as &$time) :
                    $time = $this->timeToDate($time, $key);
                endforeach;
            else :
                $obj[$key] = $this->timeToDate($obj[$key]);
            endif;
        else :
            $obj = date('Y-m-d', $obj);
        endif;
        return $obj;

    }

    public function replace($key, $value, $obj)
    {
        if (is_array($obj)) :
            foreach($obj as &$o) :
                $o = $this->replace($key, $value, $o);
            endforeach;
        else :
            $obj = str_replace($key, $value, $obj);
        endif;
        return $obj;

    }

    public function stripslashes($obj)
    {
        if (is_array($obj)) :
            foreach($obj as &$o) :
                $o = $this->stripslashes($o);
            endforeach;
        else :
            $obj = stripslashes($obj); 
        endif;
        return $obj;

    }
    
}
