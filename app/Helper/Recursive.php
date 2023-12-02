<?php

namespace App\Helper;

class Recursive
{
    public function __construct()
    {

    }

    public function categoryRecursive($id = 0, $text)
    {
        foreach ($categories as $item)
        {
            if ($item->parent_id == $id)
            {
                $this->htmlSelect .= "<option>$text $item->name</option>";
                $this->categoryRecursive($item->id, '--');
            }
            return $this->htmlSelect;
        }
    }
}
